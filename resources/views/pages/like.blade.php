<div class="btn-like">
    {!! Form::open(['url' => route('addLike'), 'method' => 'post']) !!}
        {!! Form::hidden('product_id', $products->id) !!}
        {!! Form::button('<span>Yêu thích</span><i class="fa-regular fa-heart"></i>', ['type' => 'submit']) !!}
    {!! Form::close() !!}
    
</div>