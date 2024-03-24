var footerMiddleLogo = document.getElementById("footer_middle_logo");
var footerStartCpText = document.getElementById("cpr_text");

function isSmartphone() {
  if (window.innerWidth < 768) {
    return "smartphone"; // Adjust the threshold as needed
  }
}

// Apply or remove classes based on device type
if (footerMiddleLogo) {
  if (isSmartphone() == "smartphone") {
    if (!footerMiddleLogo.classList.contains("h-0")) {
      footerMiddleLogo.classList.add("h-0");
    }
  } else {
    if (footerMiddleLogo.classList.contains("h-0")) {
      footerMiddleLogo.classList.remove("h-0");
    }
  }
}

if (footerStartCpText) {
  if (isSmartphone() == "smartphone") {
    if (!footerStartCpText.classList.contains("align-items-center")) {
      footerStartCpText.classList.add("align-items-center");
    }
  } else {
    if (footerStartCpText.classList.contains("align-items-center")) {
      footerStartCpText.classList.remove("align-items-center");
    }
  }
}
