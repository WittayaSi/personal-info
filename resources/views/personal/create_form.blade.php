@extends('layouts.master')

@section('title', 'FORM')
@section('content')
	<h1 class="title">
		ADD PERSONAL
	</h1>
	<form method="POST" action="/personal" class="was-validate">
		@csrf
		{{-- first rows --}}
		<div class="row">
			<div class="col-sm-2">
				<div class="form-group">
					<label for="prename_th">คำนำหน้าชื่อ (ไทย)</label>
				      	<select 
				      		name="prename_th" 
				      		class="form-control form-control-sm {{ $errors->has('prename_th') ? 'is-invalid' : '' }}"
				      	>
				        	<option value="">คำนำหน้าชื่อ</option>
				        	<option value="1" {{ old('prename_th') == 1 ? 'selected' : '' }}>นาย</option>
				        	<option value="2" {{ old('prename_th') == 2 ? 'selected' : '' }}>นางสาว</option>
				        	<option value="3" {{ old('prename_th') == 3 ? 'selected' : '' }}>นาง</option>
				      	</select>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="name_th" >ชื่อ (ไทย)</label>
					<input 
						type="text" 
						name="name_th" 
						class="form-control form-control-sm {{ $errors->has('name_th') ? 'is-invalid' : '' }} is-small"
						value="{{ old('name_th') }}" 
						required 
					>
					<div class="invalid-tooltip">
          				Please choose a unique and valid username.
        			</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<label for="lname_th" class="">นามสกุล (ไทย)</label>
					<input 
						type="text" 
						name="lname_th" 
						class="form-control form-control-sm {{ $errors->has('lname_th') ? 'is-invalid' : '' }} is-small"
						value="{{ old('lname_th') }}"
						required
					>
					<div class="invalid-tooltip">
          				Please choose a unique and valid username.
        			</div>
				</div>
			</div>

			<div class="col-sm-2" style="padding-top: 2.5rem">
				<div class="form-group" style="text-align: center;">
					<div class="form-check form-check-inline">
					  	<input 
					  		class="form-check-input" 
					  		type="radio" 
					  		name="sex" 
					  		id="inlineRadio1" 
					  		value="1" {{ old('sex') == 1 ? 'checked' : ''}}
					  	>
					  	<label 
					  		class="form-check-label" 
					  		for="inlineRadio1"
					  		style="font-size: .9rem; color: {{ $errors->has('sex') ? 'red' : '' }}"
					  	>ชาย</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input 
					  		class="form-check-input" 
					  		type="radio" 
					  		name="sex" 
					  		id="inlineRadio2" 
					  		value="2"
					  		{{ old('sex') == 2 ? 'checked' : ''}}
					  	>
					  	<label 
					  		class="form-check-label" 
					  		for="inlineRadio2" 
					  		style="font-size: .9rem; color: {{ $errors->has('sex') ? 'red' : '' }}"
					  	>หญิง</label>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-sm">ADD</button>
		</div>

		@include('errors')

		
	</form>
@endsection