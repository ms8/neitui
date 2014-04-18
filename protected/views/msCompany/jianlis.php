<section class="pad-25" id="action-box">
    <div class="container">
        <div class="subpage-title noline">
            <h5>收到的简历</h5>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 20%">职位</th>
                <th style="width: 20%">应聘者</th>
                <th style="width: 40%">简历</th>
                <th style="width: 20%">投递时间</th>
                <!--                            <th>备注</th>-->
            </tr>
            </thead>

            <tbody>
            <?php foreach ($jobinfos as $jobinfo) {?>
                <tr>
                    <td>
                        <a id="<?php  echo $jobinfo['jobid'] ?>" data-toggle="modal" data-target="#job"
                           onclick="setJob(this)" href="#">
                            <i class="icon-eye-open"></i>&nbsp<?php  echo $jobinfo['title'] ?>
                        </a>
                    </td>
                    <td>
                        <?php  echo $jobinfo['username'] ?>
                    </td>
                    <td>
                        <a id="<?php  echo $jobinfo['path'] ?>" data-toggle="modal" data-target="#jianli" href="#" onclick="setPath(this)">
                            <i class="icon-file-text"></i>&nbsp<?php  echo $jobinfo['jianliname'] ?>
                        </a>
                    </td>
                    <td>
                        <?php  echo $jobinfo['createtime'] ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</section>


<!-- Modal jianli-->
<div class="modal fade" id="jianli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">简历详情</h4>
            </div>
            <div class="modal-body">
                <div id="viewer" style="border:2px solid black"></div>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

<!-- Modal jobs-->
<div class="modal fade" id="job" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width:45%">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title" id="jobtitle"></h4>
            </div>
            <div class="modal-body">
                <div id="jobcontent" style=""></div>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_GLOBAL.'pdf/pdf.js');
?>

<script type="text/javascript">
    function setJob(obj){
        $("#jobtitle").text($(obj).text());
        $.ajax({
            type:'POST',
            dataType:'json',
            url:'<?php echo Yii::app()->createUrl('msjobs/detail')?>'+"/"+$(obj).attr("id"),
            success:function(data) {
                var detail = data.description;
                $("#jobcontent").html(detail);
            }
        });
    }

    function setPath(obj){
        var url = "<?php echo Yii::app()->baseUrl?>"+"/"+$(obj).attr("id");
        // Fetch the PDF document from the URL using promices
        PDFJS.getDocument(url).then(function getPdfForm(pdf) {
            // Rendering all pages starting from first
            var viewer = document.getElementById('viewer');
            var pageNumber = 1;
            renderPage(viewer, pdf, pageNumber++, function pageRenderingComplete() {
                if (pageNumber > pdf.numPages) {
                    return; // All pages rendered
                }
                // Continue rendering of the next page
                renderPage(viewer, pdf, pageNumber++, pageRenderingComplete);
            });
        });
    }

    var formFields = {};

    function setupForm(div, content, viewport) {
        function bindInputItem(input, item) {
            if (input.name in formFields) {
                var value = formFields[input.name];
                if (input.type == 'checkbox') {
                    input.checked = value;
                } else if (!input.type || input.type == 'text') {
                    input.value = value;
                }
            }
            input.onchange = function pageViewSetupInputOnBlur() {
                if (input.type == 'checkbox') {
                    formFields[input.name] = input.checked;
                } else if (!input.type || input.type == 'text') {
                    formFields[input.name] = input.value;
                }
            };
        }
        function createElementWithStyle(tagName, item) {
            var element = document.createElement(tagName);
            var rect = PDFJS.Util.normalizeRect(
                viewport.convertToViewportRectangle(item.rect));
            element.style.left = Math.floor(rect[0]) + 'px';
            element.style.top = Math.floor(rect[1]) + 'px';
            element.style.width = Math.ceil(rect[2] - rect[0]) + 'px';
            element.style.height = Math.ceil(rect[3] - rect[1]) + 'px';
            return element;
        }
        function assignFontStyle(element, item) {
            var fontStyles = '';
            if ('fontSize' in item) {
                fontStyles += 'font-size: ' + Math.round(item.fontSize *
                    viewport.fontScale) + 'px;';
            }
            switch (item.textAlignment) {
                case 0:
                    fontStyles += 'text-align: left;';
                    break;
                case 1:
                    fontStyles += 'text-align: center;';
                    break;
                case 2:
                    fontStyles += 'text-align: right;';
                    break;
            }
            element.setAttribute('style', element.getAttribute('style') + fontStyles);
        }

        content.getAnnotations().then(function(items) {
            for (var i = 0; i < items.length; i++) {
                var item = items[i];
                switch (item.subtype) {
                    case 'Widget':
                        if (item.fieldType != 'Tx' && item.fieldType != 'Btn' &&
                            item.fieldType != 'Ch') {
                            break;
                        }
                        var inputDiv = createElementWithStyle('div', item);
                        inputDiv.className = 'inputHint';
                        div.appendChild(inputDiv);
                        var input;
                        if (item.fieldType == 'Tx') {
                            input = createElementWithStyle('input', item);
                        }
                        if (item.fieldType == 'Btn') {
                            input = createElementWithStyle('input', item);
                            if (item.flags & 32768) {
                                input.type = 'radio';
                                // radio button is not supported
                            } else if (item.flags & 65536) {
                                input.type = 'button';
                                // pushbutton is not supported
                            } else {
                                input.type = 'checkbox';
                            }
                        }
                        if (item.fieldType == 'Ch') {
                            input = createElementWithStyle('select', item);
                            // select box is not supported
                        }
                        input.className = 'inputControl';
                        input.name = item.fullName;
                        input.title = item.alternativeText;
                        assignFontStyle(input, item);
                        bindInputItem(input, item);
                        div.appendChild(input);
                        break;
                }
            }
        });
    }

    function renderPage(div, pdf, pageNumber, callback) {
        pdf.getPage(pageNumber).then(function(page) {
            var scale = 1.5;
            var viewport = page.getViewport(scale);

            var pageDisplayWidth = viewport.width;
            var pageDisplayHeight = viewport.height;

            var pageDivHolder = document.createElement('div');
            $(pageDivHolder).attr('style','margin:0 auto');
            pageDivHolder.className = 'pdfpage';
            pageDivHolder.style.width = pageDisplayWidth + 'px';
            pageDivHolder.style.height = pageDisplayHeight + 'px';
            div.appendChild(pageDivHolder);

            // Prepare canvas using PDF page dimensions
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            canvas.width = pageDisplayWidth;
            canvas.height = pageDisplayHeight;
            pageDivHolder.appendChild(canvas);

            // Render PDF page into canvas context
            var renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            page.render(renderContext).promise.then(callback);

            // Prepare and populate form elements layer
            var formDiv = document.createElement('div');
            pageDivHolder.appendChild(formDiv);

            setupForm(formDiv, page, viewport);
        });
    }


</script>