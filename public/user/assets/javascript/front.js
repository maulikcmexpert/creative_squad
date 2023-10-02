var base_url = $("#base_url").val();

toastr.options = {
	closeButton: true,
	debug: false,
	newestOnTop: false,
	progressBar: true,
	positionClass: "toast-top-right",
	preventDuplicates: false,
	onclick: null,
	showDuration: "300",
	hideDuration: "1000",
	timeOut: "5000",
	extendedTimeOut: "1000",
	showEasing: "swing",
	hideEasing: "linear",
	showMethod: "fadeIn",
	hideMethod: "fadeOut",
};

$(document).on("click", ".switch_btn", function () {
	$(".switch_btn").removeClass("active");
	$(this).addClass("active");
	$(".switch_btn").each(function () {
		if ($(this).hasClass("month") && $(this).hasClass("active")) {
			$(".yearly-salary-wapper").addClass("d-none");
			$(".monthly-salary-wapper").removeClass("d-none");
		}
		if ($(this).hasClass("year") && $(this).hasClass("active")) {
			$(".yearly-salary-wapper").removeClass("d-none");
			$(".monthly-salary-wapper").addClass("d-none");
		}
	});
});

$(document).on("change", ".profession", function () {
	removeMinMax();
	$(".total-salary-wrapper").attr("id", "salary_wage");
	$("#Stack").parent().addClass("d-none");
	$("#techno").parent().addClass("d-none");
	$("#experience").parent().addClass("d-none");
	let profession_id = $(this).data("profession_id");
	$.ajax({
		url: base_url + "front/getStackOfprofession",
		type: "post",
		dataType: "JSON",
		data: {
			profession_id: profession_id,
		},
		success: function (res) {
			if (res.status == 1) {
				$("#Stack").parent().removeClass("d-none");
				$("#Stack").html("");
				$("#Stack").html(res.stack);
			}
		},
	});
});

$(document).on("change", ".stack", function () {
	removeMinMax();
	$(".total-salary-wrapper").attr("id", "salary_wage");
	let stack_name = $(this).data("name");
	if ($("#experience").length) {
		$("input[name=radioname4]").prop("checked", false);
	}
	$("#techno").parent().addClass("d-none");
	$("#experience").parent().addClass("d-none");
	let stack_id = $(this).data("stack_id");
	$.ajax({
		url: base_url + "front/getTechOfStack",
		type: "post",
		dataType: "JSON",
		data: {
			stack_id: stack_id,
		},
		success: function (res) {
			if (res.status == 1) {
				if (res.techNstack == "1") {
					$("#techno").parent().addClass("d-none");
					$("#experience").parent().removeClass("d-none");
				} else {
					$("#techno").parent().removeClass("d-none");
				}
				$("#techno").html("");
				$("#techno").html(res.tech);
			}
		},
	});
});

$(document).on("change", ".tech", function () {
	$("#experience").parent().removeClass("d-none");
	var tech_id = $(this).data("tech_id");
	if ($("#experience").length) {
		if ($("input[name=radioname4].techno_checkbox:checked")) {
			experience_id = $("input[name=radioname4].techno_checkbox:checked")
				.parent()
				.data("experience_id");
		}
		commonAjax(experience_id, tech_id);
	}
});

$(document).on("change", ".experience", function () {
	var experience_id = $(this).data("experience_id");
	var tech_id = "";
	if ($("#techno").length) {
		if ($("input[name=radioname3].techno_checkbox:checked")) {
			tech_id = $("input[name=radioname3].techno_checkbox:checked")
				.parent()
				.data("tech_id");
		}
	}
	commonAjax(experience_id, tech_id);
	$(".total-salary-wrapper").removeAttr("id");
});

function commonAjax(experience_id, tech_id) {
	$.ajax({
		url: base_url + "front/getexperienceWisePay",
		type: "post",
		dataType: "JSON",
		data: {
			tech_id: tech_id,
			experience_id: experience_id,
		},
		success: function (res) {
			if (res.status == 1) {
				removeMinMax();
				$.each(res.result, function (key, val) {
					if (val.type == "monthly") {
						$("#creativesquad-pr").html(
							"<h3>" + val.min + "€" + " - " + val.max + "€" + "</h3>"
						);
						$("#frc_cost").html(
							"Coût réel en France*:" +
								val.frc_min +
								"€" +
								" - " +
								val.frc_max +
								"€"
						);
					}
					if (val.type == "yearly") {
						$("#creativesquad-pr-year").html(
							"<h3>" + val.min + "€" + " - " + val.max + "€" + "</h3>"
						);
						$("#frc_cost_yr").html(
							"Coût réel en France*: " +
								val.frc_min +
								"€" +
								" - " +
								val.frc_max +
								"€"
						);
					}
				});
				$(".fill_info").addClass("d-none");
				$(".cost-wrap").removeClass("d-none");
			}
		},
	});
}

function removeMinMax() {
	$(".fill_info").removeClass("d-none");
	$(".cost-wrap").addClass("d-none");
	$("#min-monthly").html("");
	$("#max-monthly").html("");
	$("#min-yearly").html("");
	$("#max-yearly").html("");

	$("#frcmin-monthly").html("");
	$("#frcmax-monthly").html("");
	$("#frcmin-yearly").html("");
	$("#frcmax-yearly").html("");

	$("#frcminBase-monthly").html("");
	$("#frcmaxBase-monthly").html("");
	$("#frcminBase-yearly").html("");
	$("#frcmaxBase-yearly").html("");
}

$(document).ready(function () {
	$("#requestToConnect").validate({
		rules: {
			email: {
				required: true,
				email: true,
			},
		},
		messages: {
			email: {
				required: "Please enter email",
				email: "Please enter valid email",
			},
		},
	});

	$(document).on("click", "#sentMail", function (e) {
		e.preventDefault();

		if ($("#requestToConnect").valid()) {
			var email = $("#email").val();

			var profession_id = $('input[name="radioname1"]:checked')
				.closest(".profession")
				.data("profession_id");

			var stack_id = $('input[name="radioname2"]:checked')
				.closest(".stack")
				.data("stack_id");

			var tech_id = $('input[name="radioname3"]:checked')
				.closest(".tech")
				.data("tech_id");

			var experience_id = $('input[name="radioname4"]:checked')
				.closest(".experience")
				.data("experience_id");

			//  profession,stack,tech,experience //
			var profession = $('input[name="radioname1"]:checked')
				.next(".proffesion-sub-category")
				.find("h4")
				.text();

			var stack = $('input[name="radioname2"]:checked')
				.next(".proffesion-sub-category")
				.find("h4")
				.text();

			var tech = $('input[name="radioname3"]:checked')
				.next(".proffesion-sub-category")
				.find("h4")
				.text();

			var experience = $('input[name="radioname4"]:checked')
				.next(".proffesion-sub-category")
				.find("h4")
				.text();

			//  profession,stack,tech,experience //

			var activeButton = $(".button_tabs button");
			var costoftime = "";
			activeButton.each(function () {
				if ($(this).hasClass("active")) {
					costoftime = $(this).attr("buttonid");
				}
			});

			if (
				profession_id !== undefined &&
				stack_id !== undefined &&
				experience_id !== undefined &&
				costoftime !== undefined &&
				profession_id.trim() !== "" &&
				stack_id.trim() !== "" &&
				experience_id.trim() !== "" &&
				costoftime.trim() !== ""
			) {
				$(this).text("Sending...");

				$(this).attr("disabled", true);
				$.ajax({
					method: "POST",
					url: base_url + "front/sendemail",
					data: {
						email: email,
						profession_id: profession_id,
						stack_id: stack_id,
						tech_id: tech_id,
						experience_id: experience_id,
						costoftime: costoftime,
						profession: profession,
						stack: stack,
						tech: tech,
						experience: experience,
					},
					success: function (output) {
						if (output == "true") {
							$("#sentMail").text("Send");
							$("#sentMail").attr("disabled", false);
							resetForm();
							$(".close").trigger("click");
							toastr.success(
								"Email is sent successfully to our representetive",
								"Success"
							);
						} else if (output == "false") {
							resetForm();
							$(".close").trigger("click");
							toastr.error("Something went wrong", "Error");
						}
					},
				});
			} else {
				resetForm();
				$(".close").trigger("click");
				toastr.error("Please select project details", "Error");
			}
		}
	});

	$(document).on("click", ".hire", function () {
		$("#mobile_code").intlTelInput({
			initialCountry: "fr",
			separateDialCode: true,
			// utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
		});
	});

	$("#contactForm").validate({
		rules: {
			name: {
				required: true,
			},
			contact_email: {
				required: true,
				email: true,
			},
			phone_number: {
				required: true,
				number: true,
			},
			country: {
				required: true,
			},
			message: {
				required: true,
			},
		},
		messages: {
			name: {
				required: "Please enter name",
			},
			contact_email: {
				required: "Please enter email",
				email: "Please enter valid email",
			},
			phone_number: {
				required: "Please enter phone number",
				number: "The value should be a number.",
			},
			country: {
				required: "Please select country",
			},
			message: {
				required: "Please enter message",
			},
		},
	});

	$(document).on("click", "#sentContactMail", function (e) {
		e.preventDefault();
		if ($("#contactForm").valid()) {
			$(this).text("Sending...");

			$(this).attr("disabled", true);
			$.ajax({
				method: "POST",
				url: base_url + "front/contactDetailSend",
				data: $("#contactForm").serialize(),

				success: function (output) {
					if (output == "true") {
						$("#sentContactMail").text("Send Message");

						$("#sentContactMail").attr("disabled", false);
						resetForm();
						$(".close").trigger("click");
						toastr.success(
							"Email is sent successfully to our representetive",
							"Success"
						);
					} else if (output == "false") {
						resetForm();
						$(".close").trigger("click");

						toastr.error("Something went wrong", "Error");
					}
				},
			});
		}
	});
});

function resetForm() {
	$("input").val("");
	$("textarea").val("");
	$("#country").prop("selectedIndex", 0);
}

$(document).on("click", ".close", function () {
	$("input").val("");
	$("textarea").val("");
	$("#country").prop("selectedIndex", 0);
	$("#requestToConnect").validate().resetForm();
	$("#requestToConnect").find(".error").removeClass("error");
	$("#contactForm").validate().resetForm();
	$("#contactForm").find(".error").removeClass("error");
});
