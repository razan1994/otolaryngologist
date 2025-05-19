@foreach ($blogs as $blog)
    <div class="col-md-12">
        <div class="article-card style-3">
            <div class="article-image">
                <a href="{{ route('blog-details', $blog->alias_name) }}" class="article-card-img">
                    @if (isset($blog->image) && file_exists($blog->image))
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" loading="lazy">
                    @endif
                </a>
                <div class="blog-date">
                    <a href="{{ route('blog-details', $blog->alias_name) }}">
                        {!! \Carbon\Carbon::parse($blog->created_at)->translatedFormat('j F Y') !!}
                    </a>
                </div>
            </div>
            <div class="article-card-content">
                <h5><a href="{{ route('blog-details', $blog->alias_name) }}" class="hover-underline">
                    {{ Str::limit($blog->title, 60) }}</a>
                </h5>
                <p>{!! Str::limit(strip_tags($blog->description), 150) !!}</p>
                <a href="{{ route('blog-details', $blog->alias_name) }}">{{ __('front_end.btn_ReadMore') }}</a>
            </div>
        </div>
    </div>
@endforeach
