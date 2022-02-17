
<form id="kt_account_basic_info_form" class="form">
												<!--begin::Card body-->
												<div class="card-body">
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8">
															<!--begin::Image input-->
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(../assets/media/avatars/blank.png)">
																<!--begin::Preview existing avatar-->
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url(../assets/media/avatars/150-2.jpg)"></div>
																<!--end::Preview existing avatar-->
																<!--begin::Label-->
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																	<i class="bi bi-pencil-fill fs-7"></i>
																	<!--begin::Inputs-->
																	<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
																	<input type="hidden" name="avatar_remove" />
																	<!--end::Inputs-->
																</label>
																<!--end::Label-->
																<!--begin::Cancel-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																	<i class="bi bi-x fs-2"></i>
																</span>
																<!--end::Cancel-->
																<!--begin::Remove-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																	<i class="bi bi-x fs-2"></i>
																</span>
																<!--end::Remove-->
															</div>
															<!--end::Image input-->
															<!--begin::Hint-->
															<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
															<!--end::Hint-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8">
															<!--begin::Row-->
															<div class="row">
																<!--begin::Col-->
																<div class="col-lg-6 fv-row">
																	<input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="Manish" />
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="col-lg-6 fv-row">
																	<input type="text" name="lname" class="form-control form-control-lg form-control-solid" placeholder="Last name" value="Shaw" />
																</div>
																<!--end::Col-->
															</div>
															<!--end::Row-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-bold fs-6">Company</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Trapo India Pvt Ltd" />
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-bold fs-6">
															<span class="required">Contact Phone</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
														</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="+91 8777807321" />
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-bold fs-6">Company Site</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="website" class="form-control form-control-lg form-control-solid" placeholder="Company website" value="Trapo.in" />
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-bold fs-6">
															<span class="required">Country</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
														</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a Country..." class="form-select form-select-solid form-select-lg">
																<option value="">Select a Country...</option>
																<option value="AF">Afghanistan</option>
																
															</select>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-bold fs-6">Language</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="language" aria-label="Select a Language" data-control="select2" data-placeholder="Select a Language..." class="form-select form-select-solid form-select-lg">
																<option value="">Select a Language...</option>
																<option value="id">Bahasa Indonesia - Indonesian</option>
																
															</select>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-bold fs-6">Time Zone</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="timezone" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select a Timezone.." class="form-select form-select-solid form-select-lg">
																<option value="">Select a Timezone..</option>
																<option data-bs-offset="-39600" value="International Date Line West">(GMT-11:00) International Date Line West</option>
																<option data-bs-offset="-39600" value="Midway Island">(GMT-11:00) Midway Island</option>
																
															</select>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-bold fs-6">Currency</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="currnecy" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select a currency.." class="form-select form-select-solid form-select-lg">
																<option value="">Select a currency..</option>
																<option data-kt-flag="flags/united-states.svg" value="USD">
																<b>USD</b>&#160;-&#160;USA dollar</option>
																
															</select>
														</div>
														<!--end::Col-->
													</div>												
													
												</div>
												<!--end::Card body-->
												<!--begin::Actions-->
												<div class="card-footer d-flex justify-content-end py-6 px-9">
													<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
													<button type="submit" class="btn btn-primary" id="kt_account_basic_info_submit">Save Changes</button>
												</div>
												<!--end::Actions-->
											</form>