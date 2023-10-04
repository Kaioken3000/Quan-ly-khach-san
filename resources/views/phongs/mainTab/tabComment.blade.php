<table class="table">
    <thead>
        <tr>
            <th class="table-plus">Số phòng</th>
            <th>Bình luận</th>
            {{-- <th>Phân loại</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($phongs as $phong)
            <tr>
                <td>{{ $phong->so_phong }}</td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->comments as $comment)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>
                                    <?php
                                    try {
                                        $response = Http::connectTimeout(0.5)->timeout(0.5)->get('http://127.0.0.1:4000/apiv3/comment-classify/' . $comment->noidung);
                                        $response = $response->json();
                                            if (implode($response) == 'Tích cực'){
                                                echo '<span class="badge badge-light-primary rounded-pill">
                                                    '.implode($response).'
                                                </span>';
                                            }
                                            else {
                                                echo '<span class="badge badge-light-danger rounded-pill">
                                                    '.implode($response).'
                                                </span>';
                                            }
                                    } catch (\Throwable $th) {
                                        //throw $th;
                                    }
                                    try {
                                        $response = Http::connectTimeout(0.5)->timeout(0.5)->get('http://127.0.0.1:7000/apiv3/comment-classify/' . $comment->noidung);
                                        $response = $response->json();
                                            echo '<span class="mx-2 badge badge-light-success rounded-pill">
                                                '.implode($response).'
                                            </span>';
                                    } catch (\Throwable $th) {
                                        //throw $th;
                                    }
                                    ?>
                                    {{ $comment->noidung }}
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
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th class="table-plus">Số phòng</th>
            <th>Bình luận</th>
            {{-- <th>Phân loại</th> --}}
        </tr>
    </tfoot>
</table>
