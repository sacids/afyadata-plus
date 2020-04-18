<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css"/>
<link href="<?= base_url('assets/css/builder.css') ?>" rel="stylesheet">

<!-- Page content -->
<div class="page-content">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline" style="margin-top: -25px;
            margin-bottom: -25px !important;">
                <div class="page-title d-flex">
                    <h4><i class="icon-home4 mr-2"></i> <span class="font-weight-semibold">Form Builder</span></h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div><!--./page-title -->
            </div><!--./page-header-content -->
        </div><!-- /page header -->


        <!-- Content area -->
        <div class="content">
            <!-- Basic datatable -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Form Builder</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 p-3" id="wrapper">
                        </div><!--./col-md-8 -->
                        <div class="col-md-4 p-3" id="props">
                        </div><!--./col-md-4 -->
                    </div>
                </div><!--./card-body -->
            </div><!-- /basic datatable-->
        </div><!-- /content area-->

        <footer class="footer">
            <div class="container">
                <div class="d-flex flex-row bd-highlight">
                    <div class="eprop element px-2 bd-highlight" id="available9" properties="text">Text</div>
                    <div class="eprop element px-2 bd-highlight" id="available4" properties="number">Number
                    </div>
                    <div class="eprop element px-2 bd-highlight" id="available9" properties="select1">Choose One
                    </div>
                    <div class="eprop element px-2 bd-highlight" id="available9" properties="select">Choose Many
                    </div>
                    <div class="eprop element px-2 bd-highlight" id="available5" properties="email">Email</div>
                    <div class="eprop element px-2 bd-highlight" id="available6" properties="date">Date</div>
                    <div class="eprop element px-2 bd-highlight" id="available7" properties="time">Time</div>
                    <div class="eprop element px-2 bd-highlight" id="available8" properties="datetime-local">
                        Date
                        Time
                    </div>
                    <div class="eprop element px-2 bd-highlight" id="available10" properties="file">File</div>
                    <div class="eprop element px-2 bd-highlight" id="available15" properties="media">Media</div>
                    <div class="eprop element px-2 bd-highlight" id="available11" properties="url">URL</div>
                    <div class="eprop element px-2 bd-highlight" id="available13" properties="textarea">Textarea
                    </div>
                    <div class="eprop element px-2 bd-highlight" id="available14" properties="location">Location
                    </div>
                    <div class="eprop element px-2 bd-highlight" id="available16" properties="barcode">Barcode
                    </div>

                    <div class="ml-auto px-2 bd-highlight" id="addPage">+ Add Page</div>
                    <div class="ml-auto px-2 bd-highlight" id="serialize">Export</div>
                </div>
            </div><!--./container-fluid -->
        </footer>
    </div><!-- /main content -->
</div><!-- /page content -->

<!-- Bootstrap core JavaScript
  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript" src="http://www.pureexample.com/js/lib/jquery.ui.touch-punch.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-serialize-object/2.5.0/jquery.serialize-object.min.js"></script>

<script>
    $(function () {
        var element_id = 0;

        $("#wrapper .items").sortable({
            connectWith: "<div>",
            beforeStop: function (event, ui) {
                newItem = ui.item;
            },
            receive: function (event, ui) {

                element_id++;
                var type = $(newItem).attr('properties');
                property = '{"type":"' + type + '","data_name":"element_' + element_id + '","label":"New ' + type + '","hint":"", "required":"", "relevance":"","constraints":""}';

                $(newItem).attr('id', element_id);
                $(newItem).attr("properties", property);
                $(newItem).html(
                    '<div style="float:left">' +
                    '<span class="label h6">New Page</span><br>' +
                    '<span class="data_name small"></span><br>' +
                    '<span class="hint small"></span>' +
                    '</div>' +
                    '<div class="actions" style="float:right;">' +
                    '<span class="edit"><i style="color: #616161;" class="icon-pencil"></i></span>&nbsp;&nbsp;&nbsp;' +
                    '<span class="del"><i style="color: red;" class="icon-cross3"></i></span>' +
                    '</div>' +
                    '<div style="clear:both"></div>'
                );
                //$(newItem).children('actions').show();
            }
        });

        $("div[id^='available']").draggable({
            helper: "clone",
            connectToSortable: ".items"
        });

        //$('.element .actions').hide();

        $(document).on('click', '.del', function (event) {
            $(this).closest('.eprop').remove();
        });

        $(document).on('click', '#add_option', function (event) {

            var count = $('.select_option_items').length;

            tmp = '<div class="select_option_items"><i>Option ' + count + '</i><br>' +
                '<label class="option_label">label</label>' +
                '<input class="form-control" type="text" name="options[' + count + '][key]" value="">' +
                '<label >Value</label>' +
                '<input class="form-control" type="text" name="options[' + count + '][val]" value="">' +
                '</div>';
            $('#select_option_wrapper').append(tmp);
        });


        $(document).on('click', '#save_element_prop', function (event) {


            element_id = $(this).attr('element_id');
            obj = $('#element_prop').serializeObject();

            var props = $('#element_prop').serializeJSON();
            //alert(props);

            data_name = obj.data_name;
            hint = obj.hint;
            label = obj.label;

            //props       = JSON.stringify(obj);
            //alert(props);
            $('#' + element_id).attr('properties', props);
            $('#' + element_id + ' .data_name:first').html(data_name);
            $('#' + element_id + ' .label:first').html(label);
            $('#' + element_id + ' .hint:first').html(hint);

        });

        $(document).on('click', '.edit', function (event) {

            var div = '';
            element_id = $(this).parents('.eprop ').attr('id');
            props = $(this).parents('.eprop ').attr('properties');

            props = props.replace(/'/g, '"');
            props = JSON.parse(props);

            div = form_element(props, element_id);

            $('#props').html(div);
        });


        $.fn.serializeObject = function () {
            var o = {};
            var a = this.serializeArray();
            $.each(a, function () {
                if (o[this.name]) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };

        function form_element(obj, element_id) {

            var div = '';
            var fid = 0;
            div += '<form id="element_prop">';

            div += '<div class="form-group">' +
                '<label for="' + obj.data_name + '_type">Type</label>' +
                '<input class="form-control" type="text" id="' + obj.data_name + '_type" name="type" value="' + obj.type + '" readonly="">' +
                '</div>';

            div += '<div class="form-group">' +
                '<label for="' + obj.data_name + '_dataname">Data Name</label>' +
                '<input class="form-control" type="text" id="' + obj.data_name + '_dataname" name="data_name" value="' + obj.data_name + '" >' +
                '</div>';

            div += '<div class="form-group">' +
                '<label for="' + obj.data_name + '_label">Label</label>' +
                '<input class="form-control" type="text" id="' + obj.data_name + '_label" name="label" value="' + obj.label + '">' +
                '</div>';

            div += '<div class="form-group">' +
                '<label for="' + obj.data_name + '_hint">Hint</label>' +
                '<textarea class="form-control" type="text" id="' + obj.data_name + '_hint" name="hint">' + obj.hint + '</textarea>' +
                '</div>';

            if(obj.type === 'media'){

                var     audio = '';
                var     video = '';
                var     image = '';

                if (obj.media === 'audio')      audio   = 'selected';
                if(obj.media === 'video')       video   = 'selected';
                else                            image   = 'selected';   

                
                div += '<div class="form-group">' +
                    '<label for="' + obj.data_name + '_mtype">Media type</label>' +
                    '<select class="form-control" id="' + obj.data_name + '_mtype" name="media">' +
                    '<option value="image" '+image+'>Image</option>' +
                    '<option value="video" '+video+'>Video</option>' +
                    '<option value="audio" '+audio+'>Audio</option>' +
                    '</select>' +
                    '</div>';
            }

            if (obj.type === 'page') {
                div += '<div class="form-group">' +
                    '<label for="' + obj.data_name + '_repeat">Repeat</label>' +
                    '<select class="form-control" id="' + obj.data_name + '_repeat" name="repeat">' +
                    '<option value="0">No</option>' +
                    '<option value="1">Yes</option>' +
                    '</select>' +
                    '</div>';
            } else {

                var selected_no = '';
                var selected_yes = '';
                if (obj.required === 0) selected_no = 'selected';
                else selected_yes = 'selected';

                div += '<div class="form-group">' +
                    '<label for="' + obj.data_name + '_required">Required</label>' +
                    '<select class="form-control" id="' + obj.data_name + '_required" name="required">' +
                    '<option value="0" ' + selected_no + '>No</option>' +
                    '<option value="1" ' + selected_yes + '>Yes</option>' +
                    '</select>' +
                    '</div>';
            }
            div += '<div class="form-group">' +
                '<label for="' + obj.data_name + '_relevance">Relevance</label>' +
                '<input class="form-control" type="text" id="' + obj.data_name + '_relevance" name="relevance" value="' + obj.relevance + '">' +
                '</div>';

            div += '<div class="form-group">' +
                '<label for="' + obj.data_name + '_constraints">Constraints</label>' +
                '<input class="form-control" type="text" id="' + obj.data_name + '_constraints" name="constraints" value="' + obj.constraints + '">' +
                '</div>';

            if(obj.type === 'media'){


            }
            if (obj.type === 'select' || obj.type === 'select1') {
                tmp = '';

                $.each(obj.options, function (key, value) {
                    console.log(JSON.stringify(value));

                    tmp += '<div class="select_option_items"><i>Option ' + key + '</i><br>' +
                        '<label class="option_label">label</label>' +
                        '<input class="form-control" type="text" name="options[' + key + '][key]" value="' + value.key + '">' +
                        '<label >Value</label>' +
                        '<input class="form-control" type="text" name="options[' + key + '][val]" value="' + value.val + '">' +
                        '</div>';
                });

                div += '<div class="form-group select_options_div">' +
                    '<div">Options</div>' +
                    '<div id="select_option_wrapper">' + tmp +
                    '</div>' +
                    '<br/><button class="btn btn-danger btn-xs" type="button" id="add_option">Add Option</button>' +
                    '</div>';
            }


            div += '<div class="mt-1"><button  class="btn btn-primary btn-sm mb-2" type="button" id="save_element_prop" element_id="' + element_id + '">Save</button>';
            div += '</form>';

            return div;

        }


        $(document).on('click', '#addPage', function (event) {

            element_id++;

            var property = '{"type":"page","data_name":"element_' + element_id + '","label":"New Page","hint":"","repeat":"","relevance":"","constraints":"","options":""}';

            $('#wrapper').append(
                '<div class="eprop page p-2 m-2 rounded-lg" properties=\'' + property + '\' id="' + element_id + '">' +
                '<div style="float:left">' +
                '<span class="label h6">New Page</span><br>' +
                '<span class="data_name small text-muted">element_' + element_id + '</span><br>' +
                '<span class="hint small text-muted font-italic"></span>' +
                '</div>' +
                '<div class="actions" style="float:right;margin-right:7px">' +
                '<span class="edit"><i style="color: #616161;" class="icon-pencil"></i></span>&nbsp;&nbsp;&nbsp;' +
                '<span class="del"><i style="color: red; " class="icon-cross3"></i></span>' +
                '</div>' +
                '<div style="clear:both"></div>' +
                '<div class="items"></div></div>');


            $("#wrapper .items").sortable({
                connectWith: "<div>",
                beforeStop: function (event, ui) {
                    newItem = ui.item;
                },
                receive: function (event, ui) {
                    element_id++;
                    var type = $(newItem).attr('properties');
                    property = '{"type":"' + type + '","data_name":"element_' + element_id + '", "label":"New ' + type + '", "hint":"", "required":"", "relevance":"", "constraints":"", "options":""}';

                    $(newItem).attr('id', element_id);
                    $(newItem).attr('properties', property);
                    $(newItem).addClass('rounded-lg');
                    //$(newItem).children('actions').show();
                    $(newItem).html(
                        '<div style="float:left">' +
                        '<span class="label h6">New ' + type + '</span><br>' +
                        '<span class="data_name small text-muted">element_' + element_id + '</span><br>' +
                        '<span class="hint small text-muted font-italic"></span>' +
                        '</div>' +
                        '<div class="actions" style="float:right;">' +
                        '<span class="edit"><i style="color: #616161;" class="icon-pencil"></i></span>&nbsp;&nbsp;&nbsp;' +
                        '<span class="del"><i style="color: red; font-size: 12px;" class="icon-cross3"></i></span>' +
                        '</div>' +
                        '<div style="clear:both"></div>'
                    );

                }
            });

        });


        function serialize_tree() {

            var holder = {};

            holder['meta'] = {};
            holder['data'] = {};

            holder['meta']['form_id'] = 'Form_id';
            holder['meta']['name'] = 'Form_Name';
            holder['meta']['version'] = '1.1';
            holder['meta']['language'] = 'en';

            // data
            $('#wrapper .page').each(function (index, value) {
                var id = $(this).attr('id');
                var properties = $(this).attr('properties');
                console.log('prop ' + properties);

                holder['data'][id] = {};
                holder['data'][id] = JSON.parse(properties);
                holder['data'][id]['id'] = id;
                holder['data'][id]['child'] = {};

                $('#' + id + ' .element').each(function (index, value) {

                    var eid = $(this).attr('id');
                    var eproperties = $(this).attr('properties');
                    console.log('eprop: ' + eproperties);

                    holder['data'][id]['child'][eid] = {};
                    holder['data'][id]['child'][eid] = JSON.parse(eproperties);
                    holder['data'][id]['child'][eid]['id'] = eid;
                });

            });


            return holder;

        }

        function download(filename, text) {
            var element = document.createElement('a');
            element.setAttribute('href', 'data:text/json;charset=utf-8,' + encodeURIComponent(text));
            element.setAttribute('download', filename);

            element.style.display = 'none';
            document.body.appendChild(element);

            element.click();

            document.body.removeChild(element);
        }

        $(document).on('click', '#serialize', function (event) {


            var result = serialize_tree();
            $('#log').html(JSON.stringify(result, null, 4));
            download(result['meta']['form_id'] + '.json', JSON.stringify(result, null, 4));
            console.log(JSON.stringify(result, null, 4));
        });

    });
</script>

</body>
</html>