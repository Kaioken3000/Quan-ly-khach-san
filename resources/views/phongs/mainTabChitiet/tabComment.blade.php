<div class="d-flex">
    <div class="flex-grow-1">
        <h4 class="card-title">Các bình luận trong phòng</h4>
    </div>
</div>
<table>
    <tbody>
        @foreach ($phongs as $phong)
            <tr>
                <td>
                    @foreach ($phong->comments as $comment)
                        <li class="d-flex justify-content-between align-items-center">
                            <span class="d-flex justify-content-between">
                                User:  {{ $comment->users->username }} - 
                                <?php
                                try {
                                    $response = Http::connectTimeout(0.5)
                                        ->timeout(0.5)
                                        ->get('http://127.0.0.1:4000/apiv3/comment-classify/' . $comment->noidung);
                                    $response = $response->json();
                                    if (implode($response) == 'Tích cực') {
                                        echo '<span class="badge badge-light-primary rounded-pill">
                                                                            ' .
                                            implode($response) .
                                            '
                                                                        </span>';
                                    } else {
                                        echo '<span class="badge badge-light-danger rounded-pill">
                                                                            ' .
                                            implode($response) .
                                            '
                                                                        </span>';
                                    }
                                } catch (\Throwable $th) {
                                    //throw $th;
                                }
                                try {
                                    $response = Http::connectTimeout(0.5)
                                        ->timeout(0.5)
                                        ->get('http://127.0.0.1:7000/apiv3/comment-classify/' . $comment->noidung);
                                    $response = $response->json();
                                    echo '<span class="mx-2 badge badge-light-success rounded-pill">
                                                                                                                ' .
                                        implode($response) .
                                        '
                                                                                                            </span>';
                                } catch (\Throwable $th) {
                                    //throw $th;
                                }
                                ?>
                                Bình luận: {{ $comment->noidung }}
                                
                            </span>
                            @hasrole('Admin')
                                @isset(Auth::user()->nhanviens)
                                    @foreach (Auth::user()->nhanviens as $nhanvien)
                                        @if ($nhanvien->chinhanhs->id == $phong->chinhanhs->id)
                                            <span>
                                                @include('phongs.modal.modalXoaComment')
                                            </span>
                                        @endif
                                    @endforeach
                                @endisset
                            @endhasrole
                            @hasrole('MainAdmin')
                                <span>
                                    @include('phongs.modal.modalXoaComment')
                                </span>
                            @endhasrole
                        </li>
                    @endforeach
                </td>
            </tr>   
        @endforeach
    </tbody>
</table>
