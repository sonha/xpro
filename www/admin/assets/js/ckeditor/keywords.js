/*
 * Kiem tra keyword trong bai viet
 * @Author: Bui Van Vu - vubuivan@vccorp.vn
 */

(function(){
    // sohagame keywords validator

    var _SHG_KV = function(){}
    var _cfg = {
        attr: "name", // name or id: cac element duoc tim kiem theo id hoac nam trong form

        desc: "desc", // string
        keyword: "keyword",
        title: "title",

        // instance name from ckeditor
        content: "content",
        intro: { name: "intro_text",
                 type: "element", // element or ckeditor
                 attr: "name"
               }

    }


    var elements = new Object;

    var kv_form = false;
    var kv_elm = false;
    _SHG_KV.init = function(form, elm , opt){
        if(!elm){
            alert("SHG_KEYWORDS_VALIDATOR: Không có vị trí nào để xuất output !");
        }
        if(typeof(CKEDITOR) == "undefined"){
            elm.innerHTML = "<p style='color: red;'>Chỉ hỗ trợ CKEDITOR !</p>";
            return false;
        }
        _cfg = jQuery.extend(_cfg, opt);
        kv_form = form;
        kv_elm = elm;
        // init element and callback function :D

        elements.desc = jQuery(kv_form).find("*["+_cfg.attr+"='"+_cfg.desc+"']").get(0);
        elements.keyword = jQuery(kv_form).find("*["+_cfg.attr+"='"+_cfg.keyword+"']").get(0);
        elements.title = jQuery(kv_form).find("input["+_cfg.attr+"='"+_cfg.title+"']").get(0);

        elements.desc.onchange = SHG_KV.validate;
        elements.desc.onkeyup = SHG_KV.validate;
        elements.keyword.onchange = SHG_KV.validate;
        elements.keyword.onkeyup = SHG_KV.validate;
        elements.title.onchange = SHG_KV.validate;
        elements.title.onkeyup = SHG_KV.validate;


    }

    _SHG_KV.validate = function(){
        var html = "";

        //var content = jQuery(kv_form).find("textarea[name='"+_cfg.content+"']").get(0).value;
        var d = document.createElement("div");

        d.innerHTML = CKEDITOR.instances[_cfg.content].getSnapshot();
        var content = (d.textContent||d.innerText);
        if(_cfg.intro){
          if(_cfg.intro.type == "element"){
              d.innerHTML = jQuery(kv_form).find("textarea["+_cfg.intro.attr+"='"+_cfg.intro.name+"']")[0].value
          }else{
              d.innerHTML = CKEDITOR.instances[_cfg.intro.name].getSnapshot();
          }
        }
    /*    if(CKEDITOR.instances[_cfg.intro]){
            d.innerHTML = CKEDITOR.instances[_cfg.intro].getSnapshot();
        }else d.innerHTML = "";
     */
        var intro = (d.textContent||d.innerText);
        var title = elements.title.value;
        var desc = elements.desc.value;
        content = content.substr(0,2000);
        var keyword = elements.keyword.value;
        keyword = jQuery.trim(keyword);
        if(keyword[keyword.length-1] == ",") keyword = keyword.substr(0,keyword.length-1);
        function count_match(string){
            var patt = new RegExp(keyword.split(", ").join("|"), "gim");
            var tmp = string.match(patt);
            if(tmp){
                return tmp.length;
            }else return 0;
        }
        if(elements.keyword.value == ""){
            html = "<p style='color: red;'>Chưa nhập keyword !</p>";
        }else
        {
            html = "<h4>Số lượng keyword tìm thấy:</h4><ul>";
            html += "<li>Nội dung (tìm khoảng 300 từ đầu): <span class='badge badge-info'> "+count_match(content)+"</span></li>";
            html += "<li>Tóm tắt (intro): <span class='badge badge-info'> "+count_match(intro)+"</span></li>";
            html += "<li>Tiêu đề (title): <span class='badge badge-info'> "+count_match(title)+"</span></li>";
            html += "<li>Descriptions Meta: <span class='badge badge-info'> "+count_match(desc)+"</span></li></ul>";
            var title_html = "",
                keywords = keyword.split(", ");
            if(keywords.length > 0){
                title_html = title.replace(keywords[0], "<b>"+keywords[0]+"</b>");
            }

            for(var i = 1; i < keywords.length; i++){
                title_html = title_html.replace(keywords[i], "<b>"+keywords[i]+"</b>");
            }
            html += "<h4>Snipet preview:</h4><a class='gp-title'>"+title_html+"</a><br /><a class='gp-url'>"+document.URL+"</a><br />"+desc;

        }

        kv_elm.innerHTML = html;

    }

    // create CSS STYLESHEET

    var css = " .gp-title { color: #11c !important; font-size:16px !important; } .gp-url{color: #282 !important; } .badge-info{background: #19d; color: #fff;}",
    head = document.getElementsByTagName('head')[0],
    style = document.createElement('style');
    style.type = 'text/css';
    if (style.styleSheet){
        style.styleSheet.cssText = css;
    } else {
        style.appendChild(document.createTextNode(css));
    }
    head.appendChild(style);


    window.SHG_KV = _SHG_KV;
})();