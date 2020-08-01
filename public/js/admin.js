const updateBtn = document.getElementById("update");
const deleteBtn = document.getElementById("delete");
const backBtn = document.getElementById("back");
const usually = document.getElementById("usually");
const onEdit = document.getElementById("on-edit");
const moreBtn = document.getElementById("more");
const closeBtn = document.getElementById("close");
const recordRaws = document.querySelectorAll(".record-raw");
var i = 5;
var j = 0;
var remit = recordRaws.length;

document.addEventListener("DOMContentLoaded", function() {
    updateBtn.addEventListener("click", function() {
        usually.classList.toggle("hidden");
        onEdit.classList.toggle("hidden");
    });

    backBtn.addEventListener("click", function() {
        usually.classList.toggle("hidden");
        onEdit.classList.toggle("hidden");
    });

    moreBtn.addEventListener("click", function() {
        if (i <= remit) {
            recordRaw = document.getElementById("record-raw-" + i);
            recordRaw.classList.remove("hidden");
            closeBtn.classList.remove("hidden");
            i += 1;
        }
    });
    closeBtn.addEventListener("click", function() {
        for (m = 5; m <= remit; m++) {
            recordRaw = document.getElementById("record-raw-" + m);
            if (!recordRaw.classList.contains("hidden")) {
                recordRaw.classList.add("hidden");
            }
        }
        closeBtn.classList.add("hidden");
        i = 5;
        j = 0;
    });
});
function checkSubmit() {
    return confirm("削除しますか？");
}
