function hienlaibang() {
    var table, tr;
    table = document.getElementById("datphongtable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        tr[i].style.display = "";
    }
}

function loctheooption(xacnhanthanhtoan, xacnhannhanphong) {
    // inputthanhtoan = document.getElementById(thanhtoan);
    // inputnhanphong = document.getElementById(nhanphong);

    // Declare variables
    var inputthanhtoan, inputnhanphong, filterthanhtoan, filternhanphong,
        table, tr, tdthanhtoan, tdnhanphong, i, txtValuethanhtoan, txtValuenhanphong;

    // filterthanhtoan = inputthanhtoan.value.toUpperCase();
    // filternhanphong = inputnhanphong.value.toUpperCase();
    table = document.getElementById("datphongtable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        tdthanhtoan = tr[i].getElementsByTagName("td")[5];
        tdnhanphong = tr[i].getElementsByTagName("td")[6];
        if (tdthanhtoan && tdnhanphong) {
            txtValuethanhtoan = tdthanhtoan.textContent || tdthanhtoan.innerText;
            txtValuenhanphong = tdnhanphong.textContent || tdnhanphong.innerText;

            txtValuethanhtoan = txtValuethanhtoan.replace(/\s/g, '');
            txtValuenhanphong = txtValuenhanphong.replace(/\s/g, '');
            console.log(i)
            // console.log(xacnhanthanhtoan)
            // console.log(xacnhannhanphong)
            
            if (xacnhanthanhtoan == 'da') {
                if (xacnhannhanphong == 'da') {
                    if (!txtValuethanhtoan.toUpperCase().indexOf('XÁCNHẬN') && !txtValuenhanphong.toUpperCase().indexOf('XÁCNHẬN')) {
                        tr[i].style.display = "";
                        console.log('thuchien11')
                    } else {
                        tr[i].style.display = "none";
                        console.log('thuchien12')
                    }
                    console.log('thuchien1')}
                else if (xacnhannhanphong == 'chua') {
                    if (!txtValuethanhtoan.toUpperCase().indexOf('XÁCNHẬN') && !txtValuenhanphong.toUpperCase().indexOf('CHƯA')) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    console.log('thuchien2')}
                else {
                    if (!txtValuethanhtoan.toUpperCase().indexOf('XÁCNHẬN')) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    console.log('thuchien3')}
            }
            else if (xacnhanthanhtoan == 'chua') {
                if (xacnhannhanphong == 'da') {
                    if (!txtValuethanhtoan.toUpperCase().indexOf('CHƯA') && !txtValuenhanphong.toUpperCase().indexOf('XÁCNHẬN')) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    console.log('thuchien4')}
                else if (xacnhannhanphong == 'chua') {
                    if (!txtValuethanhtoan.toUpperCase().indexOf('CHƯA') && !txtValuenhanphong.toUpperCase().indexOf('CHƯA')) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    console.log('thuchien5')}
                else {
                    if (!txtValuethanhtoan.toUpperCase().indexOf('CHƯA')) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    console.log('thuchien6')}
            }
            else {
                if (xacnhannhanphong == 'da') {
                    if (!txtValuenhanphong.toUpperCase().indexOf('XÁCNHẬN')) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    console.log('thuchien7')}
                else if (xacnhannhanphong == 'chua') {
                    if (!txtValuenhanphong.toUpperCase().indexOf('CHƯA')) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    console.log('thuchien8')}
                else {
                    hienlaibang();
                    console.log('thuchien9')}
            }

        }
    }
}

// Nhan phong
function changeoption() {
    danhanphong = document.getElementById('danhanphong');
    chuanhanphong = document.getElementById('chuanhanphong');
    tatcanhanphong = document.getElementById('tatcanhanphong');
    
    dathanhtoan = document.getElementById('dathanhtoan');
    chuathanhtoan = document.getElementById('chuathanhtoan');
    tatcathanhtoan = document.getElementById('tatcathanhtoan');

    if(dathanhtoan.checked){
        if(danhanphong.checked){
            loctheooption('da','da')
        }
        if(chuanhanphong.checked){
            loctheooption('da','chua')
        }
        if(tatcanhanphong.checked){
            loctheooption('da','tatca')
        }
    }
    else if(chuathanhtoan.checked){
        if(danhanphong.checked){
            loctheooption('chua','da')
        }
        if(chuanhanphong.checked){
            loctheooption('chua','chua')
        }
        if(tatcanhanphong.checked){
            loctheooption('chua','tatca')
        }
    }
    else if(tatcathanhtoan.checked){
        if(danhanphong.checked){
            loctheooption('tatca','da')
        }
        if(chuanhanphong.checked){
            loctheooption('tatca','chua')
        }
        if(tatcanhanphong.checked){
            loctheooption('tatca','tatca')
        }
    }
}

