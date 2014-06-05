/**
 * @author: Bui Van Vu
 * @
 */


!function( $ ) {

    var _curent = false,  _cr_dir = "";
    window._cke_cfg = {
        baseUrl: "http://x.cms.sohagame.vn/admin/",
        path: "VCMediaManager/ajax",
        src: "http://sohagame.vcmedia.vn/public/x7_batquai/",
        dir_icon: "shg_admin/images/folder-icon.png",
        src_relative: "/",
        abs: false,
        ckeditor: false,
        onSelect: function(){}
    };

    var _now = false;
  //  var _ = false;
    var modal_html = '<div data-ready = "false" class="modal fade" id="modal_img_picker" data-ready="false">'
                   +    '<div class="modal-dialog">'
                   +    '<div class="modal-content">'
                   +            '<div class="modal-header">'
                   +                '<div id="modal-nav"></div>'
                   +            '</div>'
                   +            '<div class="modal-body" style="height: 500px; overflow: auto;" id="modal_body_img_picker">'
                   +                '<div class="preload" style="text-align: center;">'
                   +                    '<h4>Đang tải dữ liệu...</h4>'
                   +                '</div>'
                   +            '</div>'
                   +            '<div style="position: relative; " class="modal-footer">'
                   +                '<span id="upload-holder-ip"></span>'
                   +                '<span style="padding-right: 30px;" style="display:none" id="cke-image-opts">Alt: <input type="text" name = "alt" style="width: 80px"/>  </span>'
                   +                '<button type="button" class="btn" id="imagespicker_back_btn">Trở về trước</button>'
                   +                '<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng lại</button>'
                   +            '</div>'
                   +         '</div>'
                   +    '</div>'
                   +  '</div>';

    $(modal_html).appendTo("body");


    function loadImages(_dir, o){

        _cr_dir = _dir;

        function __T(s){
            return s.length >  15 ? s.substr(0,15) + "..." : s;
        }
        _dir = _dir ? _dir : "";

        $.ajax(
            {
                url: o.baseUrl + o.path,
                data: {folder: _dir},
                type: "GET",
                cache: false,
                success: function(s){
                    var data = JSON.parse(s);
                    var html = "<ul class='ace-thumbnails manage_img'>";
                    if(data.files) for(var i = 0; i< data.files.length; i++){
                        var img = data.files[i];
                        var src = o.src + (_dir == "" ?  "" : "/") +_dir +"/"+ img;
                        html += "<li img='"+img+"' class='thumbnail img-select' style='width: 160px; height: 160px;' ><a><img style='max-width: 128px; max-height: 128px;' src='"+src+"' /> </a> <div class='text'><div class='inner'>"+__T(img)+"</div></div></li>";
                    }

                    if(data.dirs) for(var i = 0; i< data.dirs.length; i++){
                        var dir = data.dirs[i];
                        var cp = _dir;

                        if(cp.length > 0){
                            cp += "/";
                        }
                        html += "<li dir='"+cp+dir+"' class='thumbnail dir-select' style='width: 160px; height: 160px;' > <a><img style='width: 128px; height: 128px;' src='"+ o.baseUrl + o.dir_icon+"'/></a> <div class='inner'><div class='caption'>"+dir+"</div></div></li>";
                    }
                    html += "</ul>";
                    $("#modal_body_img_picker").html(html);
                    $(".img-select").click(function(){
                        if(o.ckeditor){
                            var __img = this.getAttribute("img");
                            var _dir_c = "";
//                            if(_dir != "" ){
//                                _dir_c  = _dir + "/";
//                            }
                            _dir_c = _dir == "" ? _dir + "/" : "/" + _dir + "/";
                            var alt = $("#cke-image-opts input[name='alt']").val();

                            var att = " alt = '" + alt + "' ";
                            var htm = "<img "+att+" src='"+o.src + _dir_c + __img +"' />";
                            window.__________cke.insertHtml(htm);

                            $("#modal_img_picker").modal("hide");

                        }else{ ////////////////////
                            // trường hợp chèn link ảnh vào thẻ input
                            var __img = this.getAttribute("img");
                            var _dir_c = "";
                            _dir_c = _dir == "" ? _dir + "/" : "/" + _dir + "/";
                            var flag = o.abs;
                            var _uri = o.src + _dir_c + __img;
                            _curent.value = flag ? _uri  : o.src_relative + _dir_c +__img;



                            if(o.onSelect){
                                o.onSelect( o.src + _dir_c + __img, __img);
                            }
                            $("#modal_img_picker").modal("hide")

                            // enable tooltip plugins
                            $(_curent).qtip(
                                {
                                    content: {
                                        text: "<img src = '"+_uri+"' style='max-width: 200px; max-height:200px;'/>"
                                    },
                                    position: {
                                        viewport: $(window),
                                        target: "mouse",
                                        adjust: {
                                            mouse: true,
                                            x: 5, y:10
                                        }
                                    },
                                    style: {
                                        classes: 'ui-tooltip ui-tooltip-rounded ui-tooltip-shadow',
                                        tip: { corner: false}
                                    }

                                }
                            );// qtip
                        }//if

                    });

                    $(".dir-select").click(function(event){
                        var d = this.getAttribute("dir");
                        loadImages(d,o);
                        event.preventDefault();
                    });
                    makeNav(_dir, o); //
                    //
                    document.getElementById("imagespicker_back_btn").onclick =function(){
                        var bd = _dir.split("/");
                        bd.pop();
                        bd = bd.join("/");
                        loadImages(bd, o);

                    }

                    $("#upload-holder-ip").html('<button  type="button" class="btn" id="imagespicker_upload_btn">Tải lên</button>');


                    // ** UPLOADER  ** /
                    window.x_uploader = $("#imagespicker_upload_btn").upload({
                        name: 'image',
                        action: o.baseUrl + "VCMediaManager/uploadajax",
                        enctype: 'multipart/form-data',
                        params: {folder: _dir},
                        autoSubmit: false,
                        onSubmit: function() {
                            $("#modal_body_img_picker").html("<div style = 'text-align: center;'><img src='"+ (o.baseUrl + "shg_admin/images/preload.gif") +"' with='32' height='32' /><h4>Đang tải lên...</h4></div>");
                        },
                        onComplete: function(s) {if(s){
                         try{
                             var _res = JSON.parse(s);
                             if(_res.status == "0"){
                                 alert("Có lỗi xảy ra khi tải lên: "+_res.msg);
                             }
                         }catch(e){

                         }
                         loadImages(_dir,o); // refresh
                        }},
                        onSelect: function() {

                            var re = new RegExp("(jpg|gif|png)$", "i");
                            if (!re.test(window.x_uploader.filename())) {

                                window.x_uploader.submit();
                                return false;
                            }else{
                               // $("#small").html("<img src='images/loading.gif' /> Đang tải ảnh lên...");

                                window.x_uploader.submit();
                            }
                        }// onselect
                    });

                    $("#modal_img_picker").attr("data-ready", true);

                },
                error: function(s){

                }
            }
        );
    }

    function makeNav(dir, opt){
        dir = dir.split("/");
        var html = '<ol id = "ibebfbnawccraju" class="breadcrumb">';
            html += "<li><a href='#' index='0' >Gốc</a></li>";
        for(var i = 0; i < dir.length; i++){
            html += "<li><a index='"+(i+1)+"'>"+dir[i]+"</a></li>";
        }
        html += "</ol>";
        $("#modal-nav").html(html);
        $("#ibebfbnawccraju a").click(function(event){
            event = event || window.event;
            var ind = this.getAttribute("index");
            var elms = document.getElementById("ibebfbnawccraju").getElementsByTagName("a");
            var _D = "";
            for(var  i = 1; i <=  ind; i++){
                _D += elms[i].innerHTML;
                if(i < ind){
                    _D += "/";
                }
            }

            loadImages(_D,opt);
            event.preventDefault();

        }).css("cursor","pointer");
    }


    $.cke_loadImages = function(){
        $("#modal_img_picker").modal("show");
        $("#modal_body_img_picker").html("<h4 style='text-align: center;'>Đang tải...</h4>");
        var options = $.extend(_cke_cfg,{abs: true, ckeditor: true});

        loadImages(_cr_dir, options);
        $("#modal_img_picker").attr("data-ready","false");
        $("#cke-image-opts").show();
        $("#cke-image-opts input").each(function(i,e) {e.value = "";});
    }

    $.fn.imagesPicker = function(op) {

        this.each(function(i,e){
        var parent = e.parentNode, this_html = parent.innerHTML;
        var new_html = '<div class="input-group img-picker">'
                     +  this_html + '<span class="input-group-addon clicker" style="cursor:pointer"><span class="icon-picture"></span></span>'
                     +  '</div>';
        parent.innerHTML = new_html;
        var current =$(parent).find(".img-picker");
            current = current.find(".clicker");
            current.click(function(){
            var _pk = $.extend( {
                baseUrl: "http://x.cms.sohagame.vn/admin/",
                path: "VCMediaManager/ajax",
                src: "http://sohagame.vcmedia.vn/public/x7_batquai/",
                dir_icon: "shg_admin/images/folder-icon.png",
                src_relative: "/",
                abs: false,
                ckeditor: false,
                onSelect: function(){}
            }, op);
            _curent = $(this.parentNode.parentNode).find("input").get(0);

           $("#modal_img_picker").modal("show");
           $("#cke-image-opts").hide();
           loadImages(_cr_dir,_pk);

         });
      });
      return this;
    };

    $(function(){
        var css = " .thumbnail{text-align: center; position: relative; border:solid 1px #ddd !important; cursor: pointer; transition: box-shadow .3s linear; }",
            head = document.getElementsByTagName('head')[0],
            style = document.createElement('style');
        css += " .thumbnail:hover{box-shadow: 0px 0px 10px #0090d0;}";
        style.type = 'text/css';
        if (style.styleSheet){
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }
        head.appendChild(style);
    });
}( jQuery );

/*
 * One Click Upload - jQuery Plugin
 * Copyright (c) 2008 Michael Mitchell - http://www.michaelmitchell.co.nz
 */
(function($){
    $.fn.upload = function(options) {
        /** Merge the users options with our defaults */
        options = $.extend({
            name: 'file',
            enctype: 'multipart/form-data',
            action: '',
            autoSubmit: true,
            onSubmit: function() {},
            onComplete: function() {},
            onSelect: function() {},
            params: {}
        }, options);
        return new $.ocupload(this, options);
    },

        $.ocupload = function(element, options) {
            /** Fix scope problems */
            var self = this;

            /** A unique id so we can find our elements later */
            var id = new Date().getTime().toString().substr(8);

            /** Upload Iframe */
            var iframe = $(
                '<iframe '+
                    'id="iframe'+id+'" '+
                    'name="iframe'+id+'"'+
                    '></iframe>'
            ).css({
                    display: 'none'
                });

            /** Form */
            var form = $(
                '<form '+
                    'method="post" '+
                    'enctype="'+options.enctype+'" '+
                    'action="'+options.action+'" '+
                    'target="iframe'+id+'"'+
                    '></form>'
            ).css({
                    margin: 0,
                    padding: 0
                });

            /** File Input */
            var input = $(
                '<input '+
                    'name="'+options.name+'" '+
                    'type="file" '+
                    '/>'
            ).css({
                    position: 'relative',
                    display: 'block',
                    marginLeft: -175+'px',
                    opacity: 0
                });

            /** Put everything together */
            element.wrap('<div></div>'); //container
            form.append(input);
            element.after(form);
            element.after(iframe);

            /** Find the container and make it nice and snug */
            var container = element.parent().css({
                position: 'absolute',
                height: '40px',
                width: '100px',
                top: "15px",
                overflow: 'hidden',
                cursor: 'pointer',
                margin: 0,
                padding: 0
            });

            /** Put our file input in the right place */
            input.css('marginTop', -container.height()-10+'px');

            /** Move the input with the mouse to make sure it get clicked! */
            container.mousemove(function(e){
                input.css({
                    top: e.pageY-container.offset().top+'px',
                    left: e.pageX-container.offset().left + 40+'px'
                });
            });

            /** Watch for file selection */
            input.change(function() {
                /** Do something when a file is selected. */
                self.onSelect();

                /** Submit the form automaticly after selecting the file */
                if(self.autoSubmit) {
                    self.submit();
                }
            });

            /** Methods */
            $.extend(this, {
                autoSubmit: true,
                onSubmit: options.onSubmit,
                onComplete: options.onComplete,
                onSelect: options.onSelect,

                /** get filename */
                filename: function() {
                    console.log(input);
                    return input.value;

                },

                /** get/set params */
                params: function(params) {
                    var params = params ? params : false;

                    if(params) {
                        options.params = $.extend(options.params, params);
                    }
                    else {
                        return options.params;
                    }
                },

                /** get/set name */
                name: function(name) {
                    var name = name ? name : false;

                    if(name) {
                        input.attr('name', value);
                    }
                    else {
                        return input.attr('name');
                    }
                },

                /** get/set action */
                action: function(action) {
                    var action = action ? action : false;

                    if(action) {
                        form.attr('action', action);
                    }
                    else {
                        return form.attr('action');
                    }
                },

                /** get/set enctype */
                enctype: function(enctype) {
                    var enctype = enctype ? enctype : false;

                    if(enctype) {
                        form.attr('enctype', enctype);
                    }
                    else {
                        return form.attr('enctype');
                    }
                },

                /** set options */
                set: function(obj, value) {
                    var value =	value ? value : false;

                    function option(action, value) {
                        switch(action) {
                            default:
                                throw new Error('[jQuery.ocupload.set] \''+action+'\' is an invalid option.');
                                break;
                            case 'name':
                                self.name(value);
                                break;
                            case 'action':
                                self.action(value);
                                break;
                            case 'enctype':
                                self.enctype(value);
                                break;
                            case 'params':
                                self.params(value);
                                break;
                            case 'autoSubmit':
                                self.autoSubmit = value;
                                break;
                            case 'onSubmit':
                                self.onSubmit = value;
                                break;
                            case 'onComplete':
                                self.onComplete = value;
                                break;
                            case 'onSelect':
                                self.onSelect = value;
                                break;
                        }
                    }

                    if(value) {
                        option(obj, value);
                    }
                    else {
                        $.each(obj, function(key, value) {
                            option(key, value);
                        });
                    }
                },

                /** Submit the form */
                submit: function() {
                    /** Do something before we upload */
                    this.onSubmit();

                    /** add additional paramters before sending */
                    $.each(options.params, function(key, value) {
                        form.append($(
                            '<input '+
                                'type="hidden" '+
                                'name="'+key+'" '+
                                'value="'+value+'" '+
                                '/>'
                        ));
                    });

                    /** Submit the actual form */
                    form.submit();

                    /** Do something after we are finished uploading */
                    iframe.unbind().load(function() {
                        /** Get a response from the server in plain text */
                        var myFrame = document.getElementById(iframe.attr('name'));
                        var response = $(myFrame.contentWindow.document.body).text();

                        /** Do something on complete */
                        self.onComplete(response); //done :D
                    });
                }
            });
        }
})(jQuery);