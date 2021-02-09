$(function () {
  $(".tomboltambahdata").on("click", function () {
    $("#modallabel").html("Tambah Operator Baru");
    $(".card-footer1 button[type=submit]").html("Tambah");
  });

  $(".tampilmodalubah").on("click", function () {
    $("#modallabel").html("Ubah Data Operator");
    $(".card-footer1 button[type=submit]").html("Ubah");

    const id = $(this).data("id");

    $.ajax({
      url: "/admin/ubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id);
        $("#nim").val(data.nim);
        $("#fullname").val(data.fullname);
        $("#hakfakultas").val(data.hakfakultas);
        $("#no_hp").val(data.no_hp);
        $("#email").val(data.email);
        $("#username").val(data.username);
        $("#password").val(data.password_hash);
      },
    });
  });
});
