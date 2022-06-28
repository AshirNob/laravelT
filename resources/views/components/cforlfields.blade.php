<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>{{ $shopName }} Manage Field </h2>
                <div class="frame-wrap mb-0">
                    <button type="button" class="btn btn-warning mx-3" data-toggle="modal"
                        data-target=".default-example-modal-bottom">Add New Field</button>
                </div>
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
                    <div class="col-12 bordered">
                        @foreach ($fields as $item)
                            <div class="form-group">
                                <label>{{ $item['label'] }}</label>
                                <input type="{{ $item['type'] }}" class="form-control"
                                    placeholder="Name:{{ $item['name'] }}" readonly>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Bottom -->
<div class="modal fade default-example-modal-bottom" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-bottom">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#">
                <div class="d-flex flex-row">
               
                        <input type="hidden" value={{ $shopId }}>
                        <div class="form-group mx-3">
                            <label for="">Select Type</label>
                            <select name="type" id="" class="form-control" required>
                                @foreach ($allFields as $field_)
                                    <option value="{{ $field_->id }}">{{ $field_->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mx-3">
                            <label for="">Label</label>
                            <input type="text" name="label" class="form-control" required>
                        </div>
                        <div class="form-group mx-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
<div class="form-group">
    <button type="submit" class="btn btn-sm btn-primary mt-4">Add</button>
</div>
                        
                </div>
                
            </div>
        </form>
        </div>
    </div>
</div>
<script></script>
