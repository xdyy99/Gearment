export default function select2() {
  let select = document.querySelector(".select2-js");
  if (select) {
    $(".select2-js").select2({
      width: "100%",
    });
  }
}
