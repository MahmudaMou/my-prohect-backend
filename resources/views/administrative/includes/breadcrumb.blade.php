<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-4">
            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    @php
                        $link = url('/');
                    @endphp

                    @foreach(request()->segments() as $segment)
                        @php
                            $link .= "/" . request()->segment($loop->iteration);
                        @endphp
                        @if(rtrim(request()->route()->getPrefix(), '/') != $segment && ! preg_match('/[0-9]/', $segment))
                            @if($loop->last)
                                <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}" {{ $loop->last ? 'aria-current="page"' : '' }}>
                                    @if($loop->last)
                                        {{ $segment}}
                                    @else
                                        <a href="{{ $link }}">{{ $segment }}</a>
                                    @endif
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</div>
