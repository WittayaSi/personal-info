let fileupload = document.querySelector("#input_image");
//let filePath = document.querySelector("#spnFilePath");

let resetImage = () => {
    $('#person_image').attr('src', "/svg/download.png")    
}

let toggleInput = (input) => {
    console.log(input.id)
    switch(input.id) {
        case 'coopertive':
                if(input.checked){
                    $('#coop_no').show();
                }else{
                    document.getElementById('coop_no').value = "";
                    $('#coop_no').hide();
                }
                break;
        case 'pension_fund':
                if(input.checked){
                    $('#pension_fund_date').show();
                }else{
                    document.getElementById('pension_fund_date').value = "";
                    $('#pension_fund_date').hide();
                }
                break;
        case 'civil_servvant':
                if(input.checked){
                    $('#civil_servvant_date').show();
                }else{
                    document.getElementById('civil_servvant_date').value = "";
                    $('#civil_servvant_date').hide();
                }
                break;
        case 'department_level':
                if(input.checked){
                    $('#department_level_date').show();
                }else{
                    document.getElementById('department_level_date').value = "";
                    $('#department_level_date').hide();
                }
                break;
        case 'minitry_level':
                if(input.checked){
                    $('#minitry_level_date').show();
                }else{
                    document.getElementById('minitry_level_date').value = "";
                    $('#minitry_level_date').hide();
                }
                break;
        case 'province_level':
                if(input.checked){
                    $('#province_level_date').show();
                }else{
                    document.getElementById('province_level_date').value = "";
                    $('#province_level_date').hide();
                }
                break;
        case 'management_level':
                if(input.checked){
                    $('#management_level_date').show();
                }else{
                    document.getElementById('management_level_date').value = "";
                    $('#management_level_date').hide();
                }
                break;
        case 'ordination_pasted':
                if(input.checked){
                    $('#ordination_details').show();
                }else{
                    document.getElementById('ordination_details').value = "";
                    $('#ordination_details').hide();
                }
                break;
        case 'renew_officails':
                if(input.checked){
                    $('#renew_times').show();
                }else{
                    document.getElementById('renew_times').value = "";
                    $('#renew_times').hide();
                }
                break;
        case 'test_work':
                if(input.checked){
                    $('#test_work_response').show();
                }else{
                    document.getElementById('test_work_response').value = "";
                    $('#test_work_response').hide();
                }
                break;
    }
}

let changSex = (input) => {
    console.log(input.value)
    let input_value = input.value
    let male = document.querySelector('#male');
    let female = document.querySelector('#female');
    switch(input_value) {
        case '' : 
                male.checked = false;
                female.checked = false;
                break;
        case '1' : 
                male.checked = true;
                female.checked = false;
                break;
        default : 
                male.checked = false;
                female.checked = true;
                break;
    }
}

let readURL = (input) => {
    //console.log(input.files)
    //console.log(input.files[0])
    // var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];
    // filePath.innerHTML = "<b>Selected File: </b>" + fileName;

    if (input.files && input.files[0]) {
        console.log(input.files[0])
        console.log(input.files)
        let reader = new FileReader()
        let fileName = input.files[0].name;
        if(input.files[0].size > 2097152){
            alert("รูปภาพมีขนาดใหญ่เกินกว่า 2 MB! กรุณาเลือกรูปภาพใหม่");
            document.getElementById('input_image').value = "";
            $('#person_image').attr('src', "/svg/download.png");
        }else{

            reader.onload = function(e) {
                $('#person_image').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0])
        }
    } else {
        $('#person_image').attr('src', "/svg/download.png")
    }
}


// starter JavaScript for disabling form submissions if there are invalid fields
(
    function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    }
)();

/// phone mask
$('#phone_house').usPhoneFormat({
    format: '(xxx) xxx-xxx'
});

$('#phone_office').usPhoneFormat({
    format: '(xxx) xxx-xxx'
});

$('#phone_mobile').usPhoneFormat({
    format: '(xxx) xxx-xxxx'
});

$('#fax').usPhoneFormat({
    format: '(xxx) xxx-xxx'
});