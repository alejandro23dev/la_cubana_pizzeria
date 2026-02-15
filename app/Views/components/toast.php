<script>
  function showToast(icon, text, duration = 3000) {
    $("#toastIcon").html(icon);
    $("#toastText").text(text);

    $("#appToast").removeClass("hidden").hide().fadeIn(200);

    setTimeout(() => {
      $("#appToast").fadeOut(300);
    }, duration);
  }

  function showConfirm(text, onConfirm) {
    $("#confirmText").text(text);

    $("#appConfirm").removeClass("hidden").addClass("flex");

    $("#confirmOk")
      .off("click")
      .on("click", function() {
        $("#appConfirm").addClass("hidden").removeClass("flex");
        if (typeof onConfirm === "function") {
          onConfirm();
        }
      });

    $("#confirmCancel")
      .off("click")
      .on("click", function() {
        $("#appConfirm").addClass("hidden").removeClass("flex");
      });
  }

  function showOrderStatusConfirm(text, select, oldStatus, onConfirm) {

    $('#confirmText').text(text);

    $('#appConfirm')
      .removeClass('hidden')
      .addClass('flex');

    $('#confirmOk').off('click').on('click', function() {
      $('#appConfirm').addClass('hidden').removeClass('flex');
      if (typeof onConfirm === 'function') {
        onConfirm();
      }
    });

    $('#confirmCancel').off('click').on('click', function() {
      $('#appConfirm').addClass('hidden').removeClass('flex');
      select.val(oldStatus);
    });
  }
</script>