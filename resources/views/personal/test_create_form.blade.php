@extends('layouts.master')
@section('content')
<style type="text/css">
    .small-label {
        font-size: .8rem;
    }

    .small-tooltip {
        font-size: .6rem;
        margin-top: -0.9rem;
    }

    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }

    input::placeholder,
    textarea::placeholder,
    option,
    .select-style {
        font-size: 0.8rem;
    }
</style>

<form method="POST" action="/personal" class="needs-validation" enctype="multipart/form-data" novalidate>
    @csrf
        <!-- first rows -->
        <div class="form-row">
            <div class="col-md-2">
                <div class="text-center">
                    <img
                        src="{{ asset('svg/download.png') }}"
                        class="rounded"
                        width="150px"
                        height="180px"
                        id="person_image"
                        style="cursor: pointer"
                        onclick="document.getElementById('input_image').click()"
                    />
                </div>
                <!-- <span id="spnFilePath"></span> -->
                <input type="file" name="input_image" id="input_image" onchange="readURL(this)" style="display: none" accept="image/*">
            </div>
            <div class="col">

                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label for="prename_th" class="small-label">คำนำหน้าชื่อ (ไทย) <span style="color: red;">*</span></label>
                        <select class="form-control form-control-sm select-style" name="prename_th" required onchange="changSex(this)">
                            <option value="">-- เลือกคำนำหน้าชื่อ --</option>
                            <option value="1" {{ old('prename_th') == 1 ? 'selected' : '' }}>นาย</option>
                            <option value="2" {{ old('prename_th') == 2 ? 'selected' : '' }}>นางสาว</option>
                            <option value="3" {{ old('prename_th') == 3 ? 'selected' : '' }}>นาง</option>
                        </select>
                        <div class="invalid-tooltip small-tooltip">
                            ต้องไม่เป็นค่าว่าง
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fname_th" class="small-label">ชื่อ (ไทย) <span style="color: red;">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="fname_th" placeholder="ชื่อ" pattern="[\u0E00-\u0E7F]{2,100}" value="{{ old('fname_th') }}" required>
                        <div class="invalid-tooltip small-tooltip">
                            ต้องไม่เป็นค่าว่าง และภาษาไทยเท่านั้น
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lname_th" class="small-label">นามสกุล (ไทย) <span style="color: red;">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="lname_th" placeholder="นามสกุล" pattern="[\u0E00-\u0E7F]{2,255}" value="{{ old('lname_th') }}" required>
                        <div class="invalid-tooltip small-tooltip">
                            ต้องไม่เป็นค่าว่าง และภาษาไทยเท่านั้น
                        </div>
                    </div>
                    <div class="col-md-2 mb-3" style="margin-top: 2rem;">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="male" name="sex" class="custom-control-input" value="M" disabled>
                            <label class="custom-control-label small-label" for="male">ชาย</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="female" name="sex" class="custom-control-input" value="F" disabled>
                            <label class="custom-control-label small-label" for="female">หญิง</label>
                        </div>
                    </div>
                </div>
                <!-- third rows -->
                <div class="form-row" style="margin-top: -1rem">
                    <div class="col-md-2">
                        <label for="prename_en" class="small-label">คำนำหน้าชื่อ (อังกฤษ)</label>
                        <input type="text" class="form-control form-control-sm" name="prename_en" placeholder="prename" value="{{ old('prename_en') }}" pattern="[a-zA-Z.]{2,5}">
                        <div class="invalid-tooltip small-tooltip">
                            ต้องไม่เป็นค่าว่าง
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="fname_en" class="small-label">ชื่อ (อังกฤษ)</label>
                        <input type="text" class="form-control form-control-sm" name="fname_en" placeholder="first name" value="{{ old('fname_en') }}" pattern="[a-zA-Z]+">
                        <div class="invalid-tooltip small-tooltip">
                            ภาษาอังกฤษเท่านั้น
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="lname_en" class="small-label">นามสกุล (อังกฤษ)</label>
                        <input type="text" class="form-control form-control-sm" name="lname_en" placeholder="last name" value="{{ old('lname_en') }}" pattern="[a-zA-Z]+">
                        <div class="invalid-tooltip small-tooltip">
                            ภาษาอังกฤษเท่านั้น
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="nickname" class="small-label">ชื่อเล่น (ไทย)</label>
                        <input type="text" class="form-control form-control-sm" name="nickname" placeholder="ชื่อเล่น" value="{{ old('nickname') }}">
                        <div class="invalid-tooltip small-tooltip">
                            ต้องไม่เป็นค่าว่าง
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="affiliation" class="small-label">สังกัดบุคลากร <span style="color: red;">*</span></label>
                        <select class="form-control form-control-sm select-style" name="affiliation" required>
                            <option value="">-- เลือกสังกัดบุคลากร --</option>
                            <option value="1" {{ old('affiliation') == 1 ? 'selected' : '' }}>สังกัดบุคลากร1</option>
                            <option value="2" {{ old('affiliation') == 2 ? 'selected' : '' }}>สังกัดบุคลากร2</option>
                            <option value="3" {{ old('affiliation') == 3 ? 'selected' : '' }}>สังกัดบุคลากร3</option>
                        </select>
                        <div class="invalid-tooltip small-tooltip">
                            ต้องไม่เป็นค่าว่าง
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="citizen_id" class="small-label">เลขประจำตัวประชาชน <span style="color: red;">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="citizen_id" placeholder="เลขประจำตัวประชาชน" pattern="[0-9]{13}" value="{{ old('citizen_id') }}" required>
                        <div class="invalid-tooltip small-tooltip">
                            ต้องไม่เป็นค่าว่าง
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="official_id" class="small-label">เลขประจำตัวข้าราชการ</label>
                        <input type="text" class="form-control form-control-sm" name="official_id" placeholder="เลขประจำตัวข้าราชการ" pattern="[0-9]+" value="{{ old('official_id') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="tax_id" class="small-label">เลขประจำตัวผู้เสียภาษี</label>
                        <input type="text" class="form-control form-control-sm" name="tax_id" placeholder="เลขประจำตัวผู้เสียภาษี" pattern="[0-9]+" value="{{ old('tax_id') }}">
                    </div>
                </div>
            </div>
        </div>
        <!--  end first row -->

        <!-- fifth rows -->
        <div class="form-row" style="margin-top: 1rem;">
            <div class="col-md-3">
                <label for="position_status" class="small-label">สถานะการดำรงตำแห่นง</label>
                <input type="text" class="form-control form-control-sm" name="position_status" placeholder="สถานะการดำรงตำแห่นง" value="{{ old('position_status') }}">
            </div>
            <div class="col-md-2">
                <label for="status" class="small-label">สถานภาพ <span style="color: red;">*</span></label>
                <select class="form-control form-control-sm select-style" name="status" required>
                    <option value="">-- เลือกสถานภาพ --</option>
                    <option value="รอบรรจุ" {{ old('status') == 'รอบรรจุ' ? 'selected' : '' }}>รอบรรจุ</option>
                    <option value="ปกติ" {{ old('status') == 'ปกติ' ? 'selected' : '' }}>ปกติ</option>
                    <option value="พ้นจากส่วนราชการ" {{ old('status') == 'พ้นจากส่วนราชการ' ? 'selected' : '' }}>พ้นจากส่วนราชการ</option>
                </select>
                <div class="invalid-tooltip small-tooltip">
                    ต้องไม่เป็นค่าว่าง
                </div>
            </div>
            <div class="col-md-2">
                <label class="label small-label">สถานภาพทางกาย <span style="color: red;">*</span></label>
                <div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="normal" name="physical" class="custom-control-input" value="ปกติ" checked>
                        <label class="custom-control-label small-label" for="normal">ปกติ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="apnormal" name="physical" class="custom-control-input" value="พิการ">
                        <label class="custom-control-label small-label" for="apnormal">พิการ</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <label for="birth" class="small-label">วัน/เดือน/ปี เกิด <span style="color: red;"> *</span></label>
                <input type="date" class="form-control form-control-sm" min="{{ date('Y-m-d', strtotime('-60 year')) }}" max="{{ date('Y-m-d') }}" name="birth" value="{{ old('birth') }}" required>
                <div class="invalid-tooltip small-tooltip">
                    ต้องไม่เป็นค่าว่าง
                </div>
            </div>
            <div class="col-md-3">
                <label for="birth_place" class="small-label">สถานที่เกิด</label>
                <input type="text" class="form-control form-control-sm" name="birth_place" value="{{ old('birth_place') }}" placeholder="สถานที่เกิด">
            </div>
        </div>
        <!-- end fifth rows -->

        <!-- sixth rows -->
        <div class="form-row">
            <div class="col-md-3">
                <label for="hometown" class="small-label">ภูมิลำเนาเดิม</label>
                <select class="form-control form-control-sm select-style" name="hometown">
                    <option value="">-- เลือกภูมิลำเนาเดิม --</option>
                    @foreach($codes['provinces'] as $province)
                    <option value="{{ $province->province_id }}" {{ old('hometown') == ($province->province_id) ? 'selected' : '' }}>
                        {{ $province->province_name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="bloods" class="small-label">หมู่โลหิต</label>
                <select class="form-control form-control-sm select-style" name="bloods">
                    <option value="">-- เลือกหมู่โลหิต --</option>
                    @foreach($codes['bloods'] as $blood)
                    <option value="{{ $blood->blood_id }}" {{ old('bloods') == ($blood->blood_id) ? 'selected' : '' }}>
                        {{ $blood->blood_name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="blame" class="small-label">ตำหนิ</label>
                <input type="text" class="form-control form-control-sm" name="blame" placeholder="ตำหนิ" value="{{ old('blame') }}">
                <div class="invalid-tooltip small-tooltip">
                    ต้องไม่เป็นค่าว่าง
                </div>
            </div>
            <div class="col-md-3">
                <label for="religion" class="label small-label">ศาสนา</label>
                <select class="form-control form-control-sm select-style" name="religion">
                    <option value="">-- เลือกศาสนา --</option>
                    @foreach($codes['religions'] as $religion)
                    <option value="{{ $religion->religion_id }}" {{ old('religion') == ($religion->religion_id) ? 'selected' : '' }}>
                        {{ $religion->religion_name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- end sixth rows -->

        <!-- end seventh rows -->
        <div class="form-row">
            <div class="col-md-2">
                <label for="official_date" class="small-label">วันที่เข้ารับราชการ <span style="color: red;"> *</span></label>
                <input type="date" class="form-control form-control-sm" min="{{ date('Y-m-d', strtotime('-60 year')) }}" max="{{ date('Y-m-d') }}" name="official_date" value="{{ old('official_date') }}" required>
                <div class="invalid-tooltip small-tooltip">
                    ต้องไม่เป็นค่าว่าง
                </div>
            </div>
            <div class="col-md-2">
                <label for="work_date" class="small-label">วันที่เข้าส่วนราชการ <span style="color: red;"> *</span></label>
                <input type="date" class="form-control form-control-sm" min="{{ date('Y-m-d', strtotime('-60 year')) }}" max="{{ date('Y-m-d') }}" name="work_date" value="{{ old('work_date') }}" required>
                <div class="invalid-tooltip small-tooltip">
                    ต้องไม่เป็นค่าว่าง
                </div>
            </div>
            <div class="col-md-4">
                <label for="first_office" class="small-label">หน่วยงานที่เข้ารับราชการครั้งแรก</label>
                <input type="text" class="form-control form-control-sm" name="first_office" value="{{ old('first_office') }}" placeholder="หน่วยงานที่เข้ารับราชการครั้งแรก">
            </div>
            <div class="col">
                <label for="position_level" class="small-label">ระดับตำแหน่ง <span style="color: red;">*</span></label>
                <select class="form-control form-control-sm select-style" name="position_level" required>
                    <option value="">-- เลือกระดับตำแหน่ง --</option>
                    @foreach($codes['echelons'] as $echelon)
                    <option value="{{ $echelon->echelon_id }}" {{ old('position_level') == ($echelon->echelon_id) ? 'selected' : '' }}>
                        {{ $echelon->echelon_name}}
                    </option>
                    @endforeach
                </select>
                <div class="invalid-tooltip small-tooltip">
                    ต้องไม่เป็นค่าว่าง
                </div>
            </div>
            <div class="col">
                <label for="married_status" class="small-label">สถานภาพสมรส <span style="color: red;">*</span></label>
                <select class="form-control form-control-sm select-style" name="married_status" required>
                    <option value="">-- เลือกสถานภาพสมรส --</option>
                    @foreach($codes['mstatuses'] as $mstatus)
                    <option value="{{ $mstatus->mstatus_id }}" {{ old('married_status') == ($mstatus->mstatus_id) ? 'selected' : '' }}>
                        {{ $mstatus->mstatus_name}}
                    </option>
                    @endforeach
                </select>
                <div class="invalid-tooltip small-tooltip">
                    ต้องไม่เป็นค่าว่าง
                </div>
            </div>
        </div>
        <!-- end seventh rows -->

        <!--  address rows  -->
        <div class="form-row">
            <div class="col-md-6">
                <label for="address" class="small-label"> ที่อยู่ตามทะเบียนบ้าน</label>
                <textarea class="form-control form-control-sm" name="address" placeholder="ที่อยู่ตามทะเบียนบ้าน">{{ old('address') }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="contact_address" class="small-label"> ที่อยู่ที่สามารถติดต่อได้</label>
                <textarea class="form-control form-control-sm" name="contact_address" placeholder="ที่อยู่ที่สามารถติดต่อได้">{{ old('contact_address') }}</textarea>
            </div>
        </div>
        <!--  end address rows  -->

        <!-- contact rows -->
        <div class="form-row">
            <div class="col-md-3">
                <label class="small-label">โทรศัพท์บ้าน</label>
                <input type="text" class="form-control form-control-sm" name="phone_house" value="{{ old('phone_house') }}"
                    id="phone_house" 
                    placeholder="โทรศัพท์บ้าน"
                >
            </div>
            <div class="col-md-3">
                <label class="small-label">โทรศัพท์ที่ทำงาน</label>
                <input type="text" class="form-control form-control-sm" name="phone_office" value="{{ old('phone_office') }}"
                    id="phone_office" 
                    placeholder="โทรศัพท์ที่ทำงาน"
                >
            </div>
            <div class="col-md-3">
                <label class="small-label">โทรศัพท์มือถือ</label>
                <input type="text" class="form-control form-control-sm" name="phone_mobile" value="{{ old('phone_mobile') }}"
                    id="phone_mobile" 
                    placeholder="โทรศัพท์มือถือ"
                >
            </div>
            <div class="col-md-3">
                <label class="small-label">โทรสาร</label>
                <input type="text" class="form-control form-control-sm" name="fax" value="{{ old('fax') }}"
                    id="fax" 
                    placeholder="โทรสาร"
                >
            </div>
        </div>
        <!-- end contact rows -->
        
        <!-- father and mother names rows -->
        <div class="form-row">
            <div class="col-md-4">
                <label class="small-label">บิดา</label>
                <input type="text" class="form-control form-control-sm" name="father_name" value="{{ old('father_name') }}"
                    id="father_name" 
                    placeholder="บิดา"
                >
            </div>
            <div class="col-md-4">
                <label class="small-label">มารดา</label>
                <input type="text" class="form-control form-control-sm" name="mother_name" value="{{ old('mother_name') }}"
                    id="mother_name" 
                    placeholder="มารดา"
                >
            </div>
            <div class="col-md-4">
                <label class="small-label">คู่สมรส</label>
                <input type="text" class="form-control form-control-sm" name="spouse" value="{{ old('spouse') }}"
                    id="spouse" 
                    placeholder="คู่สมรส"
                >
            </div>
        </div>
        <!-- end father and mother names rows -->

        <!-- others rows -->
        <div class="form-row">
            <div class="col-md-3">
                <label class="small-label">เลขที่ใบประกอบวิชาชีพ</label>
                <input type="text" class="form-control form-control-sm" name="certificate_no" value="{{ old('certificate_no') }}"
                    placeholder="เลขที่ใบประกอบวิชาชีพ"
                >
            </div>
            <div class="col-md-3">
                <label class="small-label">เลขที่แฟ้ม</label>
                <input type="text" class="form-control form-control-sm" name="folder_no" value="{{ old('folder_no') }}"
                    placeholder="เลขที่แฟ้ม"
                >
            </div>
            <div class="col-md-3">
                <label class="small-label">อีเมล์</label>
                <input type="email" class="form-control form-control-sm" name="email" value="{{ old('email') }}"
                    placeholder="อีเมล์"
                >
            </div>
            <div class="col-md-3">
                <label class="small-label">เลขที่ปัญชีธนาคาร</label>
                <input type="text" class="form-control form-control-sm" name="banking_no" value="{{ old('banking_no') }}"
                    pattern="[0-9]+" 
                    placeholder="เลขที่ปัญชีธนาคาร"
                >
            </div>
        </div>
        <!-- end others rows -->
        
        <!-- check box rows -->
        <div class="form-row" style="margin-top: 2rem;">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 0.5rem;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="coopertive" name="coopertive" onchange="toggleInput(this);" 
                                value="1" {{ old('coopertive') == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label small-label" for="coopertive">เป็นสมาชิกสหกรณ์</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input 
                            type="text" 
                            class="form-control form-control-sm" 
                            name="coop_no" 
                            placeholder="เลขทะเบียนสมาชิกสหกรณ์"
                            style="display: none;" 
                            id="coop_no"
                        >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 0.5rem;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="pension_fund" name="pension_fund" onchange="toggleInput(this);"
                                value="1" {{ old('pension_fund') == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label small-label" for="pension_fund">เป็นสมาชิก กบข./กสจ.</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input 
                            type="date" 
                            class="form-control form-control-sm" 
                            name="pension_fund_date" value="{{ old('pension_fund_date') }}"
                            placeholder="วันที่เป็นสมาชิก กบข./กสจ."
                            style="display: none;" 
                            id="pension_fund_date"
                        >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 0.5rem;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="civil_servvant" name="civil_servvant" onchange="toggleInput(this);" 
                                value="1" {{ old('civil_servvant') == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label small-label" for="civil_servvant">เป็นสมาชิกสหภาพข้าราชการพลเรือนสามัญ</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="date" 
                            class="form-control form-control-sm" 
                            name="civil_servvant_date" 
                            value="{{ old('civil_servvant_date') }}"
                            placeholder="วันที่เป็นสมาชิกสหภาพ"
                            style="display: none;" 
                            id="civil_servvant_date"
                        >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 0.5rem;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="department_level" name="department_level" onchange="toggleInput(this);"
                                value="1" {{ old('department_level') == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label small-label" for="department_level">เป็นสมาชิกสหภาพข้าราชการระดับกรม</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control form-control-sm" name="department_level_date" value="{{ old('department_level_date') }}"
                            placeholder="วันที่เป็นสมาชิกสหภาพ"
                            style="display: none;" 
                            id="department_level_date"
                        >
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 0.5rem;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="minitry_level" name="minitry_level" onchange="toggleInput(this);" 
                                value="1" {{ old('minitry_level') == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label small-label" for="minitry_level">เป็นสมาชิกสหภาพข้าราชการระดับกระทรวง</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input 
                            type="date" 
                            class="form-control form-control-sm" 
                            name="minitry_level_date" 
                            placeholder="วันที่เป็นสมาชิกสหภาพ"
                            style="display: none;" 
                            id="minitry_level_date"
                        >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 0.5rem;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="province_level" name="province_level" onchange="toggleInput(this);"
                                value="1" {{ old('province_level') == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label small-label" for="province_level">เป็นสมาชิกสหภาพข้าราชการระดับจังหวัด</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input 
                            type="date" 
                            class="form-control form-control-sm" 
                            name="province_level_date" 
                            value="{{ old('province_level_date') }}"
                            placeholder="วันที่เป็นสมาชิกสหภาพ"
                            style="display: none;" 
                            id="province_level_date"
                        >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 0.5rem;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="management_level" name="management_level" onchange="toggleInput(this);" 
                                value="1" {{ old('management_level') == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label small-label" for="management_level">เป็นสมาชิกสหภาพข้าราชการประเภทตำแหน่งผู้บริหาร</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="date" 
                            class="form-control form-control-sm" 
                            name="management_level_date" 
                            value="{{ old('management_level_date') }}"
                            placeholder="วันที่เป็นสมาชิกสหภาพ"
                            style="display: none;" 
                            id="management_level_date"
                        >
                    </div>
                </div>
            </div>
        </div>
        <!-- end check box rows -->

        <!-- check box rows -->
        <div class="form-row" style="margin-bottom: 0.5rem;">
                <div class="col-md-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="draft_pasted" name="draft_pasted" 
                        value="1" {{ old('draft_pasted') == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label small-label" for="draft_pasted">ผ่านการคัดเลือกเข้ารับราชการทหาร</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ordination_pasted" name="ordination_pasted" onchange="toggleInput(this);"
                                    value="1" {{ old('ordination_pasted') == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label small-label" for="ordination_pasted">ผ่านการอุปสมบท</label>
                            </div>
                        </div>
                        <div class="col">
                            <input 
                                type="text" 
                                class="form-control form-control-sm" 
                                name="ordination_details" value="{{ old('ordination_details') }}"
                                placeholder="รายละเอียดการอุปสมบท"
                                style="display: none;" 
                                id="ordination_details"
                            >
                        </div>
                    </div>
                    
                </div>
        </div>
        <!-- end check box rows -->
        

        <!-- check box rows -->
        <div class="form-row" style="margin-bottom: 0.5rem;">
                <div class="col-md-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="hipp5" name="hipp5" 
                        value="1" {{ old('hipp5') == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label small-label" for="hipp5">HiPPS</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="new_wave" name="new_wave" 
                        value="1" {{ old('new_wave') == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label small-label" for="new_wave">New Wave</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="scoraship" name="scoraship" 
                        value="1" {{ old('scoraship') == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label small-label" for="scoraship">นักเรียนทุน</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="npr" name="npr" 
                        value="1" {{ old('npr') == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label small-label" for="npr">นปร.</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="hr_worker" name="hr_worker" 
                        value="1" {{ old('hr_worker') == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label small-label" for="hr_worker">ผู้ปฏิบัติงานด้าน HR</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="leave_verify_worker" name="leave_verify_worker" 
                            value="1" {{ old('leave_verify_worker') == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label small-label" for="leave_verify_worker">ผู้ตรวจสอบการลา</label>
                    </div>
                </div>
        </div>
        <!-- end check box rows -->

        <!-- check box rows -->
        <div class="form-row">
            <div class="col-md-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="renew_officails" name="renew_officails" 
                        value="1" 
                        onchange="toggleInput(this);"
                        {{ old('renew_officails') == 1 ? 'checked' : '' }}
                    >
                    <label class="custom-control-label small-label" for="renew_officails">ต่ออายุราชการ</label>
                </div>
            </div>
             <div class="col-md-2">
                <input 
                    type="int" 
                    class="form-control form-control-sm" 
                    name="renew_times" value="{{ old('renew_times') }}"
                    placeholder="จำนวนครั้งที่ต่อสัญญา"
                    style="display: none;" 
                    id="renew_times"
                >
            </div>
            <div class="col-md-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="test_work" name="test_work" 
                        value="1" 
                        onchange="toggleInput(this);"
                        {{ old('test_work') == 1 ? 'checked' : '' }}
                    >
                    <label class="custom-control-label small-label" for="test_work">ทดลองปฏิบัติราชการ</label>
                </div>
            </div>
             <div class="col-md-6">
                <input 
                    type="number" 
                    class="form-control form-control-sm" 
                    name="test_work_response" value="{{ old('test_work_response') }}"
                    placeholder="หน้าที่ความรับผิดชอบ"
                    style="display: none;" 
                    id="test_work_response"
                >
            </div>
        </div>
        <!-- end check box rows -->
        
        <!--  address rows  -->
        <div class="form-row">
            <div class="col-md-6">
                <label for="emergency_contact" class="small-label"> บุคคล ที่อยู่และเบอร์โทรติดต่อยามฉุกเฉิน</label>
                <textarea class="form-control form-control-sm" name="emergency_contact" placeholder="ที่อยู่ตามทะเบียนบ้าน">{{ old('emergency_contact') }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="note" class="small-label"> หมายเหตุ</label>
                <textarea class="form-control form-control-sm" name="note" placeholder="หมายเหตุ">{{ old('note') }}</textarea>
            </div>
        </div>
        <!--  end address rows  -->

        <!--  address rows  -->
        <div class="form-row">
            <div class="col-md-6">
                <label for="edited_by" class="small-label">แก้ไขโดย</label>
                <input type="text" class="form-control form-control-sm" name="edited_by" placeholder="แก้ไขโดย" value="{{ old('edited_by') }}">
            </div>
            <div class="col-md-6">
                <label for="edited_date" class="small-label">วันที่แก้ไข</label>
                <input type="date" class="form-control form-control-sm" name="edited_date" placeholder="วันที่แก้ไข" value="{{ old('edited_date') }}">
            </div>
        </div>
        <!--  end address rows  -->

        <!-- button rows -->
        <div class="form-row" style="margin-top: 2rem; margin-bottom: 5rem;">
            <div class="col-md-12" style="text-align: center;">
                <button class="btn btn-primary btn-sm" type="submit">เพิ่มข้อมูล</button>
                <button class="btn btn-danger btn-sm" type="reset" onclick="resetImage();">ล้างข้อมูล</button>
            </div>
        </div>
        <!-- end button rows -->

</form>
@endsection

@push('scripts')
<script src="{{ asset('js/jquery-input-mask-phone-number.js') }} "></script>
<script src="{{ asset('js/form-js.js') }} "></script>
@endpush
