<header>
    <div style="position: absolute; right: 200">
        <h4 id="diemtichluy">Điem tich luy: {{ Auth::user()->khachhangs[0]->diem }}</h4>
        <h4 id="luot"></h4>
        <select id="luotoption">
            <option value="1">1 lượt</option>
            <option value="5">5 lượt</option>
            <option value="10">10 lượt</option>
        </select>
        <button id="muabutton">Mua lượt chơi</button>
    </div>
    <h1>Floppy Bird</h1>
    <button id="startbutton"
        style="position: absolute; left: 548; padding: 338 214; background-color: transparent; border"></button>
    <div class="score-container">
        <div id="bestScore"></div>
        <div id="currentScore"></div>
    </div>
</header>
<canvas id="canvas" width="431" height="648"></canvas>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

    body {
        margin: 0;
        text-align: center;
        font-family: 'Press Start 2P', cursive;
        user-select: none;
    }

    header {
        margin: 0 auto;
        width: 431px;
    }

    h1 {
        background: url("https://i.ibb.co/Q9yv5Jk/flappy-bird-set.png") 0% 340px;
        padding: 1.2rem 0;
        margin: 0;
    }

    .score-container {
        display: flex;
        justify-content: space-between;
        padding: 8px 6px;
        background: #5EE270;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var luot = 0;
    var diemtichluy = {!! Auth::user()->khachhangs[0]->diem !!}
    diemtichluy = parseInt(diemtichluy)
    var luotget = localStorage.getItem("luot");
    if (luotget == null || luotget < 0) {
        localStorage.setItem("luot", 0)
        luotget = 0;
    }
    luot = parseInt(luotget)
    $("#luot").text("Lượt: " + parseInt(luot));

    $("#muabutton").click(function(e) {
        e.preventDefault();

        var option = $("#luotoption").val();
        luot = luot + parseInt(option);
        if (option == "1") {
            diemtichluy -= 100
            trudiem(100)
        } else if (option == "5") {
            diemtichluy -= 500
            trudiem(500)
        } else if (option == "10") {
            diemtichluy -= 1000
            trudiem(1000)
        }
        $("#diemtichluy").text("Điểm tích luỹ: " + diemtichluy);
        localStorage.setItem("luot", parseInt(luot))
        $("#luot").text("Lượt: " + parseInt(luot));
    });

    function trudiem(diemtru) {
        datatrudiem = JSON.stringify({
            khachhangid: {!! auth()->user()->khachhangs[0]->id !!},
            diem: diemtru,
        })
        fetch("http://khachsan-b1910261.local/mobile/game/trudiem", {
            method: "POST",
            body: datatrudiem,
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        });
    }

    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    const img = new Image();
    img.src = "https://i.ibb.co/Q9yv5Jk/flappy-bird-set.png";

    // general settings
    let gamePlaying = false;
    const gravity = .5;
    const speed = 6.2;
    const size = [51, 36];
    const jump = -11.5;
    const cTenth = (canvas.width / 10);

    let index = 0,
        bestScore = 0,
        flight,
        flyHeight,
        currentScore,
        pipe;

    // pipe settings
    const pipeWidth = 78;
    const pipeGap = 270;
    const pipeLoc = () => (Math.random() * ((canvas.height - (pipeGap + pipeWidth)) - pipeWidth)) + pipeWidth;

    const setup = () => {
        currentScore = 0;
        flight = jump;

        // set initial flyHeight (middle of screen - size of the bird)
        flyHeight = (canvas.height / 2) - (size[1] / 2);

        // setup first 3 pipes
        pipes = Array(3).fill().map((a, i) => [canvas.width + (i * (pipeGap + pipeWidth)), pipeLoc()]);
    }

    const render = () => {
        // make the pipe and bird moving 
        index++;

        // ctx.clearRect(0, 0, canvas.width, canvas.height);

        // background first part 
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height, -((index * (speed / 2)) % canvas.width) + canvas
            .width, 0, canvas.width, canvas.height);
        // background second part
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height, -(index * (speed / 2)) % canvas.width, 0, canvas
            .width, canvas.height);

        // pipe display
        if (gamePlaying) {
            pipes.map(pipe => {
                // pipe moving
                pipe[0] -= speed;

                // top pipe
                ctx.drawImage(img, 432, 588 - pipe[1], pipeWidth, pipe[1], pipe[0], 0, pipeWidth, pipe[1]);
                // bottom pipe
                ctx.drawImage(img, 432 + pipeWidth, 108, pipeWidth, canvas.height - pipe[1] + pipeGap, pipe[
                    0], pipe[1] + pipeGap, pipeWidth, canvas.height - pipe[1] + pipeGap);

                // give 1 point & create new pipe
                if (pipe[0] <= -pipeWidth) {
                    currentScore++;
                    // check if it's the best score
                    bestScore = Math.max(bestScore, currentScore);

                    // remove & create new pipe
                    pipes = [...pipes.slice(1), [pipes[pipes.length - 1][0] + pipeGap + pipeWidth,
                        pipeLoc()
                    ]];
                    console.log(pipes);
                }

                // if hit the pipe, end
                if ([
                        pipe[0] <= cTenth + size[0],
                        pipe[0] + pipeWidth >= cTenth,
                        pipe[1] > flyHeight || pipe[1] + pipeGap < flyHeight + size[1]
                    ].every(elem => elem)) {
                    gamePlaying = false;
                    alert("Bạn {!! auth()->user()->username !!} được cộng " + currentScore +
                        " điểm vào điểm tích luỹ");
                    luot--;
                    localStorage.setItem("luot", luot);
                    $("#luot").text("Lượt: " + luot);
                    diemtichluy += parseInt(currentScore-1);
                    $("#diemtichluy").text("Điểm tích luỹ: " + (parseInt(diemtichluy) + parseInt(
                        currentScore)));
                    capnhatdiem();
                    setup();
                }
            })
        }
        // draw bird
        if (gamePlaying) {
            ctx.drawImage(img, 432, Math.floor((index % 9) / 3) * size[1], ...size, cTenth, flyHeight, ...size);
            flight += gravity;
            flyHeight = Math.min(flyHeight + flight, canvas.height - size[1]);
        } else {
            ctx.drawImage(img, 432, Math.floor((index % 9) / 3) * size[1], ...size, ((canvas.width / 2) - size[0] /
                2), flyHeight, ...size);
            flyHeight = (canvas.height / 2) - (size[1] / 2);
            // text accueil
            ctx.fillText(`Điểm cao nhất : ${bestScore}`, 70, 245);
            ctx.fillText('Nhấn để chơi', 110, 535);
            ctx.font = "bold 30px courier";
        }

        document.getElementById('bestScore').innerHTML = `Cao nhat : ${bestScore}`;
        document.getElementById('currentScore').innerHTML = `Điem : ${currentScore}`;
        // tell the browser to perform anim
        window.requestAnimationFrame(render);

    }

    // launch setup
    setup();
    img.onload = render;

    // start game
    // document.addEventListener('click', () => gamePlaying = true);
    $("#startbutton").click(function (e) { 
        e.preventDefault();
        if(luot>0){
            gamePlaying = true
            flight = jump;
        } else {
            alert("Bạn cần mua thêm lượt để chơi!")
        }
    });
    // window.onclick = () => flight = jump;

    // cap nhat diem
    function capnhatdiem() {
        data = JSON.stringify({
            khachhangid: {!! auth()->user()->khachhangs[0]->id !!},
            diem: currentScore,
        })
        // console.log(data);
        fetch("http://khachsan-b1910261.local/mobile/game/capnhatdiem", {
            method: "POST",
            body: data,
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        });
    }
</script>
