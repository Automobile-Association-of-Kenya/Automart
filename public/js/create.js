(function () {
    $("#car_make").on("change", function () {
        var carmake_id = this.value;
        $("#car_model").html("");
        $.ajax({
            url: "{{ url('fetch/car-models') }}",
            type: "POST",
            data: {
                car_make_id: carmake_id,
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function (result) {
                $("#car_model").html(
                    '<option value="">Select Car Model</option>'
                );
                result.forEach((model) => {
                    console.log(model);
                    document.querySelector("#car_model").innerHTML +=
                        '<option value="' +
                        model.car_model_id +
                        '">' +
                        model.car_model_name +
                        "</option>";
                });
            },
        });
    });

    var previewImages = function (input, imgPreviewPlaceholder) {
        if (input.files) {
            var noFiles = input.files.length;
            for (let i = 0; i < noFiles; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    const div = document.createElement("span");
                    div.classList.add("img_" + i);
                    div.style.cssText = "position:relative";
                    const img = document.createElement("img");
                    img.setAttribute("src", event.target.result);
                    img.style.width = "400px";
                    img.style.height = "250px";
                    const deleter = document.createElement("span");
                    deleter.innerHTML = '<i class="fa fa-times-circle"></i>';
                    deleter.style.cssText =
                        "cursor:pointer;position:absolute;font-size: 1.3em;right:-3px;color:red;padding:6px;clip-path:circle()";
                    deleter.addEventListener("click", (e) => {
                        removeImage(input, imgPreviewPlaceholder, i);
                    });
                    div.appendChild(img);
                    div.appendChild(deleter);
                    document
                        .querySelector(imgPreviewPlaceholder)
                        .appendChild(div);
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    const removeImage = (input, imgPreviewPlaceholder, index) => {
        let removedImages = document.querySelector(".removedImgs").value;
        removedImages = removedImages += index + ",";
        document.querySelector(".removedImgs").value = removedImages;
        const el = document.querySelector(".img_" + index);
        el.parentElement.removeChild(el);
    };

    $("#fileupload1").on("change", function () {
        document.querySelector(".removedImgs1").value = "";
        previewImages(this, "div.images-preview-div1");
    });

    const str_id = $("#str_id").val(),
        token = $("input[name='_token']").val();

    /** compress cover photo*/
    var input = document.getElementById("fileupload1"),
        vehicleImagesUpload = document.getElementById("vehicleImagesUpload"),
        multiImagesUpload = document.getElementById("multiImagesUpload");

    vehicleImagesUpload.addEventListener("click", function (event) {
        event.preventDefault();
        let $this = $(this);
        var file = input.files[0];
        var reader = new FileReader();
        reader.onload = function () {
            var img = new Image();
            img.onload = function () {
                var width = 800;
                var height = 600;
                var canvas = document.createElement("canvas");
                canvas.width = width;
                canvas.height = height;
                canvas.getContext("2d").drawImage(img, 0, 0, width, height);
                var compressedFile = canvas.toDataURL("image/jpeg", 0.8);
                $.post("/application-images", {
                    _token: token,
                    str_id: str_id,
                    image: compressedFile,
                    cover_image: true,
                })
                    .done(function (params) {
                        console.log(params);
                    })
                    .fail(function (error) {
                        console.log(error);
                    });
            };
            img.src = reader.result;
        };
        reader.readAsDataURL(file);

        var files = multiImagesUpload.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var read = new FileReader();
            read.onload = function (e) {
                var img = new Image();
                img.src = e.target.result;
                img.onload = function () {
                    var canvas = document.createElement("canvas");
                    var ctx = canvas.getContext("2d");
                    canvas.width = 600;
                    canvas.height = 450;
                    let leet = "image_" + i;
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                    var compressedDataUrl = canvas.toDataURL("image/jpeg", 0.5);
                    $.post("/application-images", {
                        _token: token,
                        str_id: str_id,
                        image: compressedDataUrl,
                    })
                        .done(function (params) {
                            console.log(params);
                        })
                        .fail(function (error) {
                            console.log(error);
                        });
                };
            };
            read.readAsDataURL(file);
        }
        $(".images-preview-div").empty();
        $(".images-preview-div1").empty();
        console.log($(".images-preview-div1"));
        $(".uploadfeedback").html(
            '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Success!</strong>Files uploaded successfully. Please fill the form and submit!</div>'
        );
    });

    var compressedImages = [];

    $("#multiImagesUpload").on("change", function (e) {
        var files = e.target.files;
        previewImages(
            document.getElementById("multiImagesUpload"),
            "div.images-preview-div"
        );
    });

    $("#vehicleAdditionForm").on("submit", function (event) {
        event.preventDefault();
        let $this = $(this);
        $this.find("#vehicleSubmit").prop({
            disabled: true,
        });

        var DformData = new FormData();
        let title = $("input[name='title']").val(),
            country = $("#country").val(),
            county = $("#county").val(),
            make = $("#car_make").val(),
            model = $("#car_model").val(),
            year = $("#year").val(),
            price = $("#price").val(),
            miles = $("#miles").val(),
            enginecc = $("#enginecc").val(),
            exterior = $("#exterior").val(),
            interior = $("#interior").val(),
            usage = $("#usage").val(),
            fuel_type = $("#fuel_type").val(),
            transmission = $("#transmission").val(),
            description = $("#description").val(),
            firstname = $("#firstname").val(),
            lastname = $("#gt-lastname").val(),
            email = $("#email").val(),
            phone = $("#phone").val(),
            features = $("input[name='features[]']").serializeArray(),
            vehicle_type = $("#vehicle_type").val(),
            featuresf = [];

        $.each(features, (key, value) => {
            featuresf.push(value.value);
        });

        DformData.append("str_id", str_id);
        DformData.append("features", featuresf);
        DformData.append("title", title);
        DformData.append("country", country);
        DformData.append("county", county);
        DformData.append("make", make);
        DformData.append("model", model);
        DformData.append("year", year);
        DformData.append("price", price);
        DformData.append("miles", miles);
        DformData.append("vehicle_type", vehicle_type);
        DformData.append("enginecc", enginecc);
        DformData.append("exterior", exterior);
        DformData.append("interior", interior);
        DformData.append("usage", usage);
        DformData.append("fuel_type", fuel_type);
        DformData.append("transmission", transmission);
        DformData.append("description", description);
        DformData.append("firstname", firstname);
        DformData.append("lastname", lastname);
        DformData.append("email", email);
        DformData.append("phone", phone);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $this.find("input[name='_token']").val(),
            },
        });
        $.ajax({
            url: "/application",
            type: "POST",
            data: DformData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                $this.find("#vehicleSubmit").prop({
                    disabled: false,
                });
                var result = JSON.parse(response);
                if (result.status === "success") {
                    // removeImage(document.getElementById('fileupload1'), 'div.images-preview-div1', i);
                    // removeImage(document.getElementById('multiImagesUpload'), 'div.images-preview-div', i);
                    $this.trigger("reset");
                    $(".feedback").html(
                        '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Success!       </strong>' +
                            result.message +
                            "!</div>"
                    );
                } else if (result.status === "error") {
                    $(".feedback").html(
                        '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Oops!      </strong>Error occured during processing!</div>'
                    );
                }
                window.location.href = "/Available";
            },
            error: function (error) {
                console.log(error);
                if (error.status == 422) {
                    var p = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        p += value + "!";
                    });
                } else {
                    p += "Error occured during processing!";
                }
                $(".feedback").html(
                    '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Oops!      </strong>' +
                        p +
                        "</div>"
                );
                $("#vehicleSubmit").prop({
                    disabled: false,
                });
            },
        });
    });
})();
