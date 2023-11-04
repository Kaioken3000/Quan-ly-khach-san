<!DOCTYPE html>
<html lang="vi">

@include('client.layouts2.head')

<body>

    @include('client.layouts2.header')

    <style>
        body {
            margin: 0;
        }

        .menu {
            display: none
        }
    </style>
    <section class="services-section spad py-5 my-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Game</span>
                        <h2>Chơi để tích điểm</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container rounded-1">
        <div class="row">
            <div class="col-3 mt-3">
                <a href="/client/game1">
                    <div class="card" style="width: 18rem;  height: 25rem;">
                        <img class="card-img-top" src="/sankegameassets/cover.PNG" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                            <h3>Rắn săn mồi</h3>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 mt-3">
                <a href="/client/game2">
                    <div class="card" style="width: 18rem;  height: 25rem;">
                        <img class="card-img-top" src="/sankegameassets/flappybird.webp" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                            <h3>Floppy bird</h3>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 mt-3">
                <a href="/client/game3">
                    <div class="card" style="width: 18rem; height: 25rem;">
                        <img class="card-img-top" style="height: 18rem" src="/sankegameassets/spinningwheel.png" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                            <h3>Vòng xoay may mắn</h3>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 mt-3">
                <a href="/client/game4">
                    <div class="card" style="width: 18rem; height: 25rem;">
                        <img class="card-img-top" style="height: 18rem" src="/sankegameassets/memorycard.png" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                            <h3>Ô nhớ</h3>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
