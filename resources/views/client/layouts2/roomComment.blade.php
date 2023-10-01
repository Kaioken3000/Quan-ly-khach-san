<div class="rd-reviews">
    <h4>Bình luận</h4>
    @foreach ($phong->comments as $comment)
        <div class="review-item">
            <div class="ri-pic">
                <i class="fa fa-user-circle" style="font-size: 80px"></i>
            </div>
            <div class="ri-text">
                <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comment->created_at)->format('d-m-Y') }}</span>
                <h5>{{ $comment->users->username }}</h5>
                <p>{{ $comment->noidung }}</p>
            </div>
        </div>
    @endforeach
</div>

<div class="review-add">
    <h4>Thêm bình luận</h4>
    <form action="{{ route('comments.store') }}" class="ra-form" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <input hidden type="text" value="{{ $phong->so_phong }}" name="phongid">
                <input hidden type="text" value="{{ auth()->user()->id }}" name="userid">
                <textarea placeholder="Bình luận của bạn" name="noidung" required></textarea>
                <button type="submit">Xác nhận</button>
            </div>
        </div>
    </form>
</div>
