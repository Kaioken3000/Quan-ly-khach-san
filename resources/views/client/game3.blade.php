<body>
    <div id="chart"></div>
    <div id="question">
        <h1></h1>
    </div>
    <div class="container">
        <div class="content" style="display: flex">
            <div class="option">
                <h1>Vòng xoay may mắn</h1>
                <h4 id="diemtichluy">Điểm tích luỹ: {{ Auth::user()->khachhangs[0]->diem }}</h4>
                <h4 id="luot"></h4>
                <select id="luotoption">
                    <option value="1">1 lượt</option>
                    <option value="5">5 lượt</option>
                    <option value="10">10 lượt</option>
                </select>
                <button id="muabutton">Mua lượt chơi</button>
            </div>
        </div>
    </div>
</body>
<style>
    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --hue: 0;
    }

    .container {
        display: flex;
        min-height: 93dvh;
        /* background-color: hsl(224, 15%, 12%); */
    }

    .option {
        position: absolute;
        right: 400;
    }

    .content {
        --color-1: hsl(calc(var(--hue) + 0), 90%, 65%);
        --color-2: hsl(calc(var(--hue) + 51), 90%, 65%);
        --color-3: hsl(calc(var(--hue) + 102), 90%, 65%);
        --color-4: hsl(calc(var(--hue) + 153), 90%, 65%);
        --color-5: hsl(calc(var(--hue) + 204), 90%, 65%);
        --color-6: hsl(calc(var(--hue) + 255), 90%, 65%);
        --color-7: hsl(calc(var(--hue) + 306), 90%, 65%);
        /* width: clamp(400px, 50dvw, 800px); */
        margin: 40px 30px 0px 300px;
        height: auto;
        width: 60%;
        padding: 2.5rem 5rem;
        border-radius: 3rem;
        color: hsl(224, 15%, 95%);
        background-color: hsl(224, 25%, 25%);
        box-shadow: 0 0 0 4px var(--color-1), 0 0 0 8px var(--color-2),
            0 0 0 12px var(--color-3), 0 0 0 16px var(--color-4),
            0 0 0 20px var(--color-5), 0 0 0 24px var(--color-6),
            0 0 0 28px var(--color-7);
        font-family: sans-serif;
        animation: hue-shift 10s linear infinite;
    }

    @keyframes hue-shift {
        0% {
            --hue: 0;
        }

        100% {
            --hue: 360;
        }
    }

    .content h1 {
        font-size: 1.75rem;
        line-height: 1.875rem;
        margin-bottom: 1.25rem;
    }

    .content p {
        font-size: 1.125rem;
        line-height: 1.325rem;
        margin-bottom: 1rem;
    }

    .content p:last-child {
        margin-bottom: 0rem;
    }
</style>
<script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<style>
    h1 {
        display: flex;
        justify-content: center;
        align-items: center
    }

    text {
        font-family: Helvetica, Arial, sans-serif;
        font-size: 11px;
        pointer-events: none;
    }

    #chart {
        position: absolute;
        width: 500px;
        height: 500px;
        top: 140;
        left: 380;
    }

    #question {
        position: absolute;
        width: 400px;
        height: 500px;
        top: 146;
        left: 900px;
    }

    #question h1 {
        font-size: 50px;
        color: white;
        font-weight: bold;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        position: absolute;
        padding: 0;
        margin: 0;
        top: 50%;
        -webkit-transform: translate(0, -50%);
        transform: translate(0, -50%);
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

    var padding = {
            top: 20,
            right: 40,
            bottom: 0,
            left: 0
        },
        w = 500 - padding.left - padding.right,
        h = 500 - padding.top - padding.bottom,
        r = Math.min(w, h) / 2,
        rotation = 0,
        oldrotation = 0,
        picked = 100000,
        oldpick = [],
        color = d3.scale.category20(); //category20c()
    var data = [{
            "label": "1 điểm",
            "value": 1,
            "question": "1 điểm"
        }, // padding
        {
            "label": "2 điểm",
            "value": 2,
            "question": "2 điểm"
        }, //font-family
        {
            "label": "3 điểm",
            "value": 3,
            "question": "3 điểm"
        }, //color
        {
            "label": "4 điểm",
            "value": 4,
            "question": "4 điểm"
        }, //font-weight
        {
            "label": "5 điểm",
            "value": 5,
            "question": "5 điểm"
        }, //font-size
        {
            "label": "6 điểm",
            "value": 6,
            "question": "6 điểm"
        }, //background-color
        {
            "label": "7 điểm",
            "value": 7,
            "question": "7 điểm"
        }, //nesting
        {
            "label": "8 điểm",
            "value": 8,
            "question": "8 điểm"
        }, //bottom
        {
            "label": "9 điểm",
            "value": 9,
            "question": "9 điểm"
        }, //sans-serif
        {
            "label": "10 điểm",
            "value": 10,
            "question": "10 điểm"
        },
        {
            "label": "11 điểm",
            "value": 11,
            "question": "11 điểm"
        },
        {
            "label": "12 điểm",
            "value": 12,
            "question": "12 điểm"
        },
        {
            "label": "13 điểm",
            "value": 13,
            "question": "13 điểm"
        },
        {
            "label": "14 điểm",
            "value": 14,
            "question": "14 điểm"
        },
        {
            "label": "15 điểm",
            "value": 15,
            "question": "15 điểm"
        },
        {
            "label": "16 điểm",
            "value": 16,
            "question": "16 điểm"
        },
        {
            "label": "17 điểm",
            "value": 17,
            "question": "17 điểm"
        },
        {
            "label": "18 điểm",
            "value": 18,
            "question": "18 điểm"
        },
        {
            "label": "19 điểm",
            "value": 19,
            "question": "19 điểm"
        },
        {
            "label": "20 điểm",
            "value": 20,
            "question": "20 điểm"
        },
    ];
    var svg = d3.select('#chart')
        .append("svg")
        .data([data])
        .attr("width", w + padding.left + padding.right)
        .attr("height", h + padding.top + padding.bottom);
    var container = svg.append("g")
        .attr("class", "chartholder")
        .attr("transform", "translate(" + (w / 2 + padding.left) + "," + (h / 2 + padding.top) + ")");
    var vis = container
        .append("g");

    var pie = d3.layout.pie().sort(null).value(function(d) {
        return 1;
    });
    // declare an arc generator function
    var arc = d3.svg.arc().outerRadius(r);
    // select paths, use arc generator to draw
    var arcs = vis.selectAll("g.slice")
        .data(pie)
        .enter()
        .append("g")
        .attr("class", "slice");

    arcs.append("path")
        .attr("fill", function(d, i) {
            return color(i);
        })
        .attr("d", function(d) {
            return arc(d);
        });
    // add the text
    arcs.append("text").attr("transform", function(d) {
            d.innerRadius = 0;
            d.outerRadius = r;
            d.angle = (d.startAngle + d.endAngle) / 2;
            return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")translate(" + (d.outerRadius - 10) + ")";
        })
        .attr("text-anchor", "end")
        .text(function(d, i) {
            return data[i].label;
        });
    container.on("click", spin);

    function spin(d) {
        if (luot > 0) {
            container.on("click", null);
            //all slices have been seen, all done
            console.log("OldPick: " + oldpick.length, "Data length: " + data.length);
            if (oldpick.length == data.length) {
                console.log("done");
                container.on("click", null);
                return;
            }
            var ps = 360 / data.length,
                pieslice = Math.round(1440 / data.length),
                rng = Math.floor((Math.random() * 1440) + 360);
    
            rotation = (Math.round(rng / ps) * ps);
    
            picked = Math.round(data.length - (rotation % 360) / ps);
            picked = picked >= data.length ? (picked % data.length) : picked;
            if (oldpick.indexOf(picked) !== -1) {
                d3.select(this).call(spin);
                return;
            } else {
                oldpick.push(picked);
            }
            rotation += 90 - Math.round(ps / 2);
            vis.transition()
                .duration(3000)
                .attrTween("transform", rotTween)
                .each("end", function() {
                    //mark question as seen
                    d3.select(".slice:nth-child(" + (picked + 1) + ") path")
                    // .attr("fill", "#111");
                    //populate question
                    d3.select("#question h1")
                        .text(data[picked].question);
                    oldrotation = rotation;
    
                    /* Get the result value from object "data" */
    
                    /* Comment the below line for restrict spin to sngle time */
                    container.on("click", spin);
    
                    // thông báo và cập nhật điểm
                    alert("Bạn {!! auth()->user()->username !!} được cộng " + data[picked].value + " điểm vào điểm tích luỹ");
                    luot--;
                    localStorage.setItem("luot", luot);
                    $("#luot").text("Lượt: " + luot);
                    diemtichluy += parseInt(data[picked].value);
                    $("#diemtichluy").text("Điểm tích luỹ: " + (parseInt(diemtichluy)));
                    capnhatdiem(data[picked].value);
                });
        } else {
            alert("Bạn cần mua thêm lượt để chơi!")
        }
    }
    //make arrow
    svg.append("g")
        .attr("transform", "translate(" + (w + padding.left + padding.right) + "," + ((h / 2) + padding.top) + ")")
        .append("path")
        .attr("d", "M-" + (r * .15) + ",0L0," + (r * .05) + "L0,-" + (r * .05) + "Z")
        .style({
            "fill": "black"
        });
    //draw spin circle
    container.append("circle")
        .attr("cx", 0)
        .attr("cy", 0)
        .attr("r", 60)
        .style({
            "fill": "white",
            "cursor": "pointer"
        });
    //spin text
    container.append("text")
        .attr("x", 0)
        .attr("y", 15)
        .attr("text-anchor", "middle")
        .text("XOAY")
        .style({
            "font-weight": "bold",
            "font-size": "30px"
        });


    function rotTween(to) {
        var i = d3.interpolate(oldrotation % 360, rotation);
        return function(t) {
            return "rotate(" + i(t) + ")";
        };
    }


    function getRandomNumbers() {
        var array = new Uint16Array(1000);
        var scale = d3.scale.linear().range([360, 1440]).domain([0, 100000]);
        if (window.hasOwnProperty("crypto") && typeof window.crypto.getRandomValues === "function") {
            window.crypto.getRandomValues(array);
            console.log("works");
        } else {
            //no support for crypto, get crappy random numbers
            for (var i = 0; i < 1000; i++) {
                array[i] = Math.floor(Math.random() * 100000) + 1;
            }
        }
        return array;
    }

    // cap nhat diem
    function capnhatdiem(diemchon) {
        datacapnhat = JSON.stringify({
            khachhangid: {!! auth()->user()->khachhangs[0]->id !!},
            diem: diemchon,
        })
        // console.log(data);
        fetch("http://khachsan-b1910261.local/mobile/game/capnhatdiem", {
            method: "POST",
            body: datacapnhat,
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        });
    }
</script>
