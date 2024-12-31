
        <form action="{{ URL::to('/admin/transaction') }} " class="col-7" method="get">
            <div class="row">
                <div class="col-12">
                    <div class="input-group ps-0 justify-content-end">
                      
                            <select class="form-select transaction-select" name="vendor">
                                <option value=""
                                    data-value="{{ URL::to('/admin/transaction?vendor=' . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}"
                                    selected>{{ trans('labels.select') }}</option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}"
                                        data-value="{{ URL::to('/admin/transaction?vendor=' . $vendor->id . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}"
                                        {{ request()->get('vendor') == $vendor->id ? 'selected' : '' }}>
                                        {{ $vendor->name }}</option>
                                @endforeach
                            </select>
                       
                        <div class="input-group-append px-1">
                            <input type="date" class="form-control rounded" name="startdate"
                                value="{{ request()->get('startdate') }}">
                        </div>
                        <div class="input-group-append px-1">
                            <input type="date" class="form-control rounded" name="enddate"
                                value="{{ request()->get('enddate') }}">
                        </div>
                        <div class="input-group-append px-1">
                            <button class="btn btn-primary rounded" type="submit">{{ trans('labels.fetch') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

