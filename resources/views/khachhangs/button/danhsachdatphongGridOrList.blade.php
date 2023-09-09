<div class="d-flex align-items-center">
    <a class="btn btn-phoenix-primary px-3 me-1 {{ ($request->view == 'list') ? 'border-0 text-900 bg-white' : '' }}" href="/khachhangs/chitiet/{{ $khachhangs[0]->id }}/list"
        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hiển thị theo danh sách">
        <span class="fa-solid fa-list fs--2"></span>
    </a>
    <a class="btn btn-phoenix-primary px-3 {{ ($request->view == 'grid') ? 'border-0 text-900 bg-white' : '' }}" href="/khachhangs/chitiet/{{ $khachhangs[0]->id }}/grid"
        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hiển thị theo card"><svg width="9" height="9"
            viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0 0.5C0 0.223858 0.223858 0 0.5 0H3.5C3.77614 0 4 0.223858 4 0.5V3.5C4 3.77614 3.77614 4 3.5 4H0.5C0.223858 4 0 3.77614 0 3.5V0.5Z"
                fill="currentColor"></path>
            <path
                d="M0 5.5C0 5.22386 0.223858 5 0.5 5H3.5C3.77614 5 4 5.22386 4 5.5V8.5C4 8.77614 3.77614 9 3.5 9H0.5C0.223858 9 0 8.77614 0 8.5V5.5Z"
                fill="currentColor"></path>
            <path
                d="M5 0.5C5 0.223858 5.22386 0 5.5 0H8.5C8.77614 0 9 0.223858 9 0.5V3.5C9 3.77614 8.77614 4 8.5 4H5.5C5.22386 4 5 3.77614 5 3.5V0.5Z"
                fill="currentColor"></path>
            <path
                d="M5 5.5C5 5.22386 5.22386 5 5.5 5H8.5C8.77614 5 9 5.22386 9 5.5V8.5C9 8.77614 8.77614 9 8.5 9H5.5C5.22386 9 5 8.77614 5 8.5V5.5Z"
                fill="currentColor"></path>
        </svg>
    </a>
</div>
