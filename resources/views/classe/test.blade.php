<!--begin::Repeater-->
<form class="repeater">
    <!--begin::Form group-->
    <div class="form-group">
        <div class="sortable" data-repeater-list="group-a">
            <div data-repeater-item>
                <div class="form-group row mb-5" data-repeater-item>
                    <div class="col-md-3">
                        <label class="form-label">Select Options:</label>
                        <select class="form-select"  data-placeholder="Select an option">
                            <option></option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Datepicker:</label>
                        <input class="form-control"  placeholder="Pick a date" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tags:</label>
                        <input class="form-control"  value="tag1, tag2, tag3"/>
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-9">
                            <i class="la la-trash-o fs-3"></i>Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Form group-->

    <!--begin::Form group-->
    <div class="form-group">
        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
            <i class="la la-plus"></i>Add
        </a>
    </div>
    <!--end::Form group-->
</form>
<!--end::Repeater-->



// $("#fakir").click(function() {
    //     if ($(this).is(":checked")) {
    //         $("#checkerButton").show();
    //     } else {
    //         $("#checkerButton").hide();
    //     }
    // });
























