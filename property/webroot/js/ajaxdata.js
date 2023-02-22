$(document).ready(function () {

    var csrfToken = $('meta[name="csrfToken"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    //////////////////////////////// add user  //////////////////////////////////////////
    $("#myform").on('submit', (function (e) {

        e.preventDefault();
        $.ajax({
            url: "/users/signup",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {
                var record = JSON.parse(JSON.stringify(data));
                var obj = JSON.parse(record);
                console.log(obj);
                if (obj.status == 1) {
                    alert('Data submited succesfully');
                    window.location.href = "/users/userdata";
                } else {
                    alert('Data not submited,Please try again');
                }
            },
            error: function (e) {
                alert('please fill all fields');
            }
        });
    }));


    /////////////////////////////////// delete user/////////////////////////////////////////
    $(document).on("click", ".btn-delete-user", function () {

        if (confirm("Are you sure want to delete ?")) {
            var postdata = $(this).attr("data-id");
            var link = '/users/delete/' + postdata;
            $.ajax({
                url: link,
                data: postdata,
                type: "JSON",
                method: "post",
                success: function (response) {
                    var record = JSON.parse(JSON.stringify(response));
                    var obj = JSON.parse(record);
                    console.log(obj);
                    if (obj.status == 1) {
                        alert('Data deleted succesfully');
                        window.location.href = "/users/userdata";
                    } else {
                        alert('Data not deleted,Please try again');
                    }
                }, error: function () {
                },
            });
        }
    });

    ////////////////////////////////////////////// add property///////////////////////////////////////////

    $("#propertyadd").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "/properties/add",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {
                var record = JSON.parse(JSON.stringify(data));
                var obj = JSON.parse(record);
                console.log(obj);
                if (obj.status == 1) {
                    alert('Data submited succesfully');
                    window.location.href = "/properties/index";
                } else {
                    alert('Data not submited,Please try again');
                }
            },
            error: function (e) {
                alert('please fill all fields');
            }
        });
    }));

    /////////////////////////////////// fatch property///////////////////////////////////////////
    $(document).on("click", ".editProperty", function () {
        var property_id = $(this).data("id");
        console.log(property_id);
        $.ajax({
            url: "/properties/propertyDetail",
            data: { 'id': property_id },
            type: "JSON",
            method: "get",
            success: function (response) {
                var record = JSON.parse(JSON.stringify(response));
                var property = JSON.parse(record);
                $("#imagedd").val(property["image"]);
                $("#iddd").val(property["id"]);
                var image = property["image"];
                document
                    .querySelector("#showimg")
                    .setAttribute("src", "/img/" + image);
                $("#title").val(property["title"]);
                $("#description").val(property["description"]);
                $("#tags").val(property["tags"]);
                $("#category").val(property['property_category']['name']);
            },
        });
    });


    /////////////////////////////////////////// edit properties /////////////////////////////

    $(document).on("submit", "#property-edit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/properties/editModal",
            type: "JSON",
            method: "POST",
            processData: false,
            contentType: false,
            data: new FormData(this),
            success: function (response) {
                swal('Edit Successfully');
                $('#showproperty').load('properties/index #showproperty');
                $('#editmodel').hide();
                $(".modal-backdrop").remove();
            }
        });
    });

    //////////////////////////////// delete property/////////////////////////////////////////
    $(document).on("click", ".btn-delete-property", function () {
        var postdata = $(this).attr("data-id");
        var status = $(this).attr("status-id");
        // alert(status+postdata);
        // return false;
        swal({
            title: "Are you sure to delete this  of ?",
            text: "Delete Confirmation?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            closeOnConfirm: false
        },
            function () {
                $.ajax({
                    url: "/properties/delete/",
                    data: { 'id': postdata, 'property_status': status },
                    type: "JSON",
                    method: "post",
                    success: function (data) {
                        $('#data' + postdata).hide();
                    }
                }).done(function (data) {
                    swal("Deleted!", "Data successfully Deleted!", "success");
                })
                    .error(function (data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            })
    });

    /////////////////////////////////////////add category//////////////////////////////////////////////////
    $("#btnadd").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "/property-categories/add",
            type: "POST",
            data: $('#categoryadd').serialize(),
            success: function (result) {
                var record = JSON.parse(JSON.stringify(result));
                var obj = JSON.parse(record);
                console.log(obj);
                if (obj.status == 1) {
                    swal('Data submited succesfully');
                    $('#add-category-modal').hide();
                } else {
                    swal('Data not submited,Please try again');
                }
            }, error: function (e) {
                alert('please fill all fields');
            }
        });
    });
});

/////////////////////////////// fatch category/////////////////////////////////////////
$(document).on("click", ".fatch-category", function (e) {
    e.preventDefault();
    var category_id = $(this).data("id");
    $.ajax({
        url: "/property-categories/categoryDetail",
        data: { 'id': category_id },
        type: "JSON",
        method: "GET",
        success: function (response) {
            var record = JSON.parse(JSON.stringify(response));
            var category = JSON.parse(record);
            $("#iddd").val(category["id"]);
            $("#name").val(category["name"]);
        },
    });
});

////////////////////////////////edit category/////////////////////////////////////////
$('.category-edit-btn').click(function (e) {
    e.preventDefault();
    var postdata = $("#category-edit").serialize();
    $.ajax({
        url: "/property-categories/editcategory",
        data: postdata,
        type: "JSON",
        method: "PUT",
        success: function (response) {
            // var record = JSON.parse(JSON.stringify(response));
            // var category = JSON.parse(record);
            swal('Edit Successfully');
            $('#showdata').load('property-categories/index #showdata');
            $('#edit-category-model').hide();
            $(".modal-backdrop").remove();
        }
    });
});

/////////////////////////////  view Category ////////////////////////////////////////
$(document).on("click", ".view-category", function () {
    var category_id = $(this).data("id");
    $.ajax({
        url: "/property-categories/viewCategory",
        data: { 'id': category_id },
        type: "JSON",
        method: "GET",
        success: function (response) {
            var record = JSON.parse(JSON.stringify(response));
            var category = JSON.parse(record);
            $("#idd").append(category["id"]);
            $("#category_name").append(category["name"]);
        },
    });
});


//////////////////////////////////////////////// delete category ///////////////////////////////
// $(document).on("click", ".btn-delete-category", function () {

//     if (confirm("Are you sure want to delete ?")) {
//         var postdata = $(this).attr("data-id");

//         var link = '/property-categories/delete/' + postdata;
//         $.ajax({
//             url: link,
//             data: postdata,
//             type: "JSON",
//             method: "post",
//             success: function (response) {
//                 var record = JSON.parse(JSON.stringify(response));
//                 var obj = JSON.parse(record);
//                 console.log(obj);
//                 if (obj.status == 1) {
//                     alert('Data deleted successfully');
//                     window.location.href = "/property-categories/index";
//                 } else {
//                     alert('Data not deleted,Please try again');
//                 }

//             }, error: function () {
//                 alert('data not delted');
//             },
//         });
//     }


//////////////////////////////// delete category/////////////////////////////////////////
$(document).on("click", ".btn-delete-category", function () {
    var postdata = $(this).attr("data-id");
    var status = $(this).attr("status-id");
    alert(status);
    // alert(status+postdata);
    // return false;
    swal({
        title: "Are you sure to delete this  of ?",
        text: "Delete Confirmation?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Delete",
        closeOnConfirm: false
    },
        function () {
            $.ajax({
                url: "/property-categories/delete",
                data: { 'id': postdata, 'category_status': status },
                type: "JSON",
                method: "post",
                success: function (data) {
                    $('#data' + postdata).hide();
                }
            }).done(function (data) {
                swal("Deleted!", "Data successfully Deleted!", "success");
            })
                .error(function (data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                });
        })
});










