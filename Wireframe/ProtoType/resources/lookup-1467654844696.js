(function(window, undefined) {
  var dictionary = {
    "6fa41de9-84d9-4821-8693-d5d25dc4f4c5": "Administration",
    "1a479705-f79d-4984-8fbe-9df43cf2366d": "Login",
    "af1ac072-afe6-4a4b-8f2e-62b058c077c5": "Add Post",
    "8689a650-93bc-425b-a68b-2002a1129207": "View Post",
    "9524ffe9-aff3-4cd6-9be2-4d5382626c12": "Registration",
    "8af995f4-4a0b-4dce-950e-6f0d758cfdd2": "Forgot Password",
    "d12245cc-1680-458d-89dd-4f0d7fb22724": "Home Page",
    "87db3cf7-6bd4-40c3-b29c-45680fb11462": "960 grid - 16 columns",
    "e5f958a4-53ae-426e-8c05-2f7d8e00b762": "960 grid - 12 columns",
    "f39803f7-df02-4169-93eb-7547fb8c961a": "Template 1",
    "bb8abf58-f55e-472d-af05-a7d1bb0cc014": "default"
  };

  var uriRE = /^(\/#)?(screens|templates|masters|scenarios)\/(.*)(\.html)?/;
  window.lookUpURL = function(fragment) {
    var matches = uriRE.exec(fragment || "") || [],
        folder = matches[2] || "",
        canvas = matches[3] || "",
        name, url;
    if(dictionary.hasOwnProperty(canvas)) { /* search by name */
      url = folder + "/" + canvas;
    }
    return url;
  };

  window.lookUpName = function(fragment) {
    var matches = uriRE.exec(fragment || "") || [],
        folder = matches[2] || "",
        canvas = matches[3] || "",
        name, canvasName;
    if(dictionary.hasOwnProperty(canvas)) { /* search by name */
      canvasName = dictionary[canvas];
    }
    return canvasName;
  };
})(window);