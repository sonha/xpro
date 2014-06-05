!function(){
    var em = new Object;
    em.opt = {
        lastTabReady: false,
        lastTab: false,
        elm: false,
        ready: true
    }
    em.html = "<div><label>Tên:  <input type='text' id='tab-name' /></label><a onclick='SHG_CM.createTab();' style='margin-top: 5px;' class='btn btn-info btn-sm cursor'>Thêm</a></div>";
    em.contents = ["", ""];
    em.tabNames = ["", ""];
    em.current = 0;

    em.renderContent = function(){
        // update curent content
        em.contents[em.current] = CKEDITOR.instances["content_parse"].getData();

        var result = "";
        var tabNames = [];
        var a = document.getElementById("content_tabs").getElementsByTagName("a");
        for(var i = 0; i < (a.length - 1); i ++){
            tabNames.push(a[i].innerHTML);
        }
        em.tabNames = tabNames;
        var start  = 2, end = em.contents.length;

        // render the tabbed content
        var tab_nav = "", tab_pane = "", seed = new Date().getTime();

        for(var i = start; i <  end; i++){
            var act = i == start ?  "active" : "";
            tab_nav += "<li><a data-toggle='tab' href='#tab_content_"+i+"_"+seed+"' >"+tabNames[i]+"</a></li>";
            tab_pane += "<div class='tab-pane "+act+"' id='tab_content_"+i+"_" +seed+ "' >"+em.contents[i]+"</div>"
        }
        tab_nav = "<ul class='nav nav-tabs'>" + tab_nav + "</ul>";
        tab_pane = '<div class="tab-content">' + tab_pane + "</div>";
        if(em.contents.length > 2){
            result += (tab_nav + tab_pane);
        }

        return em.contents[0] + result + em.contents[1];
    }

    em.show = function(){
        $("#preview-modal").modal("show");
        $("#modal-title").html("Xem thử");
        $("#content_preview").html(em.renderContent());

    }

    em.showIndex = 0;
    em.setIndex = function(index){
        // save current index
        em.contents[em.current] = CKEDITOR.instances["content_parse"].getData();
        CKEDITOR.instances["content_parse"].setData(em.contents[index]);
        em.current = index;
    }


    em.createTab = function(tab_name, index){

        var flag = false;
        if(!tab_name) {
            tab_name = $("#tab-name").val();
            flag = true;
        }
        if(tab_name == ""){
            alert("Tab phải có tên !");
            return false;
        }else{
            if(!em.opt.lastTabReady){
                // create the footer-content tab
                em.opt.lastTabReady = true;
                em.opt.ready = false;
                em.createTab("Phần cuối", 1);
                em.opt.ready = true;


            }
            var li = document.createElement("li");
            if(!index) index = em.contents.length;
            li.innerHTML= "<a tab-ind = '"+index+"' class='cursor v-tab' data-toggle='tab'>"+tab_name+"</a>";
            document.getElementById("content_tabs").insertBefore(li,em.opt.elm);
            if(em.opt.ready){
                $(em.opt.elm).removeClass("active");

                if(flag) $("#addTab").popover('toggle');
                if(flag) {$(li).addClass("active");}
                $(".v-tab").click(function(){
                    var ind = $(this).attr("tab-ind");
                    SHG_CM.setIndex(ind);
                    $("#addTab").popover('hide');
                });
                em.contents.push("");
                em.setIndex(index);
            }
        }
    }

    em.init = function(){
        em.opt.elm = document.getElementById("cm-opt-elm");
        var contents = [];
        var tabs = $("#tab-container").find("tab");
        if(tabs.length > 0){
            tabs.each(function(i,e){
                contents.push(e.innerHTML);
                if(i > 1){
                    em.createTab(e.getAttribute("name"));
                }
            });
            em.contents = contents;

            em.current = 0;
            CKEDITOR.instances["content_parse"].setData(em.contents[0]);

        }
        $("#addTab").popover({
            content: SHG_CM.html,
            html: true,
            title: "Thêm tab",
            placement: "top",
            trigger: "click"
        });

    }
    em.getHomePopoverHTML = function(){
        var first_check = "", last_check = "";
        if(em.opt.firstTab){ first_check = "checked = 'true' ";}
        if(em.opt.lastTab){ last_check = "checked = 'true' ";}

        return "<div><label>Tên tab đầu:  <input value = '"+em.tabNames[0]+"' type='text' id='home-tab-name'  /></label><label><input type='checkbox' "+last_check+" id='tabs-last-check' /> Hiện tab cuối</label><div><a onclick='SHG_CM.setOpt();' style='margin-top: 5px;' class='btn btn-success btn-sm cursor'>OK</a></div></div>";

    }

    em.restore = function(url,id){
        if(id > 0){
            $.ajax(
                {
                url: url,
                data: {id: id},
                type: "GET",
                cache: false,
                success: function(s){
                    var data  = JSON.parse(s);
                    $("#modal-title").html("Các versions đã lưu của bài viết, để khôi phục lại nhấn nút [Restore]");
                    $("#preview-modal").modal("show");
                    var html =""
                             + "<table class='table'>"
                             + "<thead><th>ID</th><th>Thumbnail</th><th>Tiêu đề</th><th>Ngày sửa đổi</th><th>Hành động</th></thead>"
                             + "<tbody>";
                    var end = data.length; end = end < 11 ?  end :  10;
                    for(var i = 0; i <  end; i++){
                        var item = data[i];
                        var href= window._cke_cfg.baseUrl +  "articles/restore/?id_article="+id + "&id="+item.id;
                        html += "<tr><td>"+item.id+"</td><td><img style='max-height: 48px; max-width:  48px;' src='"+item.data5+"'/></td><td>"+item.data1+"</td><td>"+item.date_created+"</td><td><a href='"+href+"' class='btn btn-danger btn-sm'>Phục hồi</a></td></tr>";

                    }
                    html += "</tbody></table>";
                    $("#content_preview").html(html);
                },
                error: function(){
                    alert("Lỗi kết nối !");
                }
                }
            );
        }
    }

    window.SHG_CM = em; // SOHAGAME_CONTENT_MANAGER
}()
