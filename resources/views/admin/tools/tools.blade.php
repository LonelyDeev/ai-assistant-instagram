<div class="row">
    @php
        $i = 1;
        $tools_limit=[];
        if ($plan){
            $tools_limit=explode(',',$plan->tools_limit);
        }

    @endphp

    @foreach ($tools as $tool)

        @if($tool->active)
            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 mb-3 d-flex " @if(!in_array($tool->id,$tools_limit)) style="opacity: 0.3;" title="{{trans('messages.InactiveTools')}}" @endif>
                <a @if(in_array($tool->id,$tools_limit)) href="{{ URL::to('/content-' . $tool->slug) }}" @endif>
                    <div class="card tools-card border-0 shadow w-100 h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <img src="{{ helper::image_path( $tool->id . '.svg') }}" class="img-fluid rounded-circle" height="35" width="35" alt="">
                                @if (helper::appdata('')->web_layout == 2)
                                    <i class="fa-thin fa-arrow-up-left {{ session()->get('theme')=='dark' ? 'text-white' : 'text-muted'}}"></i>
                                @else
                                    <i class="fa-thin fa-arrow-up-right {{ session()->get('theme')=='dark' ? 'text-white' : 'text-muted'}}"></i>
                                @endif

                            </div>
                            <div class="mt-2">
                                <p class="p-font">{{ $tool->name }}</p>
                                <small class="text-muted mt-1">{{ $tool->description }}</small>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        @endif

    @endforeach
</div>
