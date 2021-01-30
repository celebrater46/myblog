(function() {
  "use strict";

  let cmds = document.getElementsByClassName("del");
  let i;

  for (i = 0; i < cmds.length; i++) {
    cmds[i].addEventListener("click", function(e) {
      e.preventDefault(); // a タグの既定の動きの抑制
      if (confirm("ホンマに削除してええんか？？")) { // 確認メッセージで確認した後削除
        document.getElementById("form_" + this.dataset.id).submit();
      }
    });
  }
})();