<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>{{ $shopName }} fields <Datal></Datal></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10"
                        data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                        data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                        data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <table id="dt-button" class="table table-bordered table-hover table-striped w-100">
                        <thead>

                            <tr>
                                <th>#</th>
                                @foreach ($fields as $field)
                                    <th> {{ $field->label }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody id="tblBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function fireDataTable() {
            $('#dt-button').dataTable({
                responsive: true,
                dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [{
                        extend: 'colvis',
                        text: 'Column Visibility',
                        titleAttr: 'Col visibility',
                        className: 'btn-outline-default'
                    },
                    {
                        extend: 'csvHtml5',
                        text: 'CSV',
                        titleAttr: 'Generate CSV',
                        className: 'btn-outline-default'
                    },
                    {
                        extend: 'copyHtml5',
                        text: 'Copy',
                        titleAttr: 'Copy to clipboard',
                        className: 'btn-outline-default'
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        titleAttr: 'Print Table',
                        className: 'btn-outline-default'
                    }
                ]
            });
        }
        var fieldsArrray = {!! json_encode($fields, JSON_HEX_TAG) !!};
        var fieldCount = 4;
        var cheackFieldCount = 0;
        var genCount = 1;
        var html = ``;
        $('#tblBody').html('');
        $.ajax({
            url: 'getshopfields',
            success: function(result) {
                for (var obj of result) {
                    if (cheackFieldCount == 0) {
                        html += `<tr><td>${genCount}</td>`;
                    }
                    for (var i of fieldsArrray) {
                        if (i.label == obj.label) {
                            html += `<td>${obj.value}</td>`;
                            cheackFieldCount = cheackFieldCount + 1;
                        }
                    }
                    if (cheackFieldCount == 4) {
                        cheackFieldCount = 0;
                        html += `</tr>`;
                    }
                    genCount = genCount + 1;
                }
console.log(html);
                //$('#tblBody').html(html);
              //  fireDataTable();
            }
        });


       

    });
</script>
