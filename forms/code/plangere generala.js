Fglobal = null;
function GetInstance() {
  if(Fglobal) {
    return Fglobal;
  }
  Fglobal = new Object();
  
  Fglobal.Declaratie = {
    Numar: "123456"
  };
  
  Fglobal.TestMode = false;
  
  Fglobal.value= form1.MainForm.content.value;
  Fglobal.btnValidate = form1.MainForm.footer.validare;
  Fglobal.Xml = '';
  
  var TheMethods = FormMethods();
  Fglobal.ExecuteExport = TheMethods.ExecuteExport;
  Fglobal.LoadXmlFromFile = TheMethods.LoadXmlFromFile;
  Fglobal.LoadSursaFinBySector = TheMethods.LoadSursaFinBySector;
  Fglobal.ValidateFormData = TheMethods.ValidateFormData;
  Fglobal.__RemoveAttachedFiles = TheMethods.__RemoveAttachedFiles;
  
  return Fglobal;
}

function FormMethods(){
  var TheMethods = new Object();

  TheMethods.ExecuteExport = function(){
    if(!this.ValidateFormData()){
      return;
    }
    event.target.exportDataObject({cName: 'f' + Fglobal.Declaratie.Numar + '.xml', nLaunch: 0});

  };

  TheMethods.__RemoveAttachedFiles = function(){
    var TheDataObjects = event.target.dataObjects;
    if (TheDataObjects == null){
      return;
    }
    for (var I = 0; I < TheDataObjects.length; I++){
      event.target.removeDataObject(TheDataObjects[I].name);
    }
  };

  TheMethods.ValidateFormData = function(){
    this.__RemoveAttachedFiles();
    var theErrorMessage = "";
    if(Fglobal.value.rawValue == "" || Fglobal.value.rawValue == null){
      theErrorMessage += "* EROARE - Nu puteti valida o plangere goala!\r\n";
    }
    if(theErrorMessage != ""){
      if(theErrorMessage.length > 400) {
        var TheShortMessage = theErrorMessage.slice(0, 399) + "..." + "\r\n Verificati fisierul atasat pentru lista completa de erori !";
        xfa.host.messageBox(TheShortMessage, 'f' + Fglobal.Declaratie.Numar);
       } else {
        xfa.host.messageBox(theErrorMessage);
        xfa.host.messageBox("Verificati fisierul atasat pentru erori si avertizari !",'f' + Fglobal.Declaratie.Numar);
      }
      if(!Fglobal.TestMode){
        event.target.removeDataObject('f' + Fglobal.Declaratie.Numar + '.xml');
        event.target.removeDataObject("Erori si Avertizari.txt");
        event.target.createDataObject("Erori si Avertizari.txt", theErrorMessage);
        theErrorMessage = '';
      } else {
        theErrorMessage = '';
      }
      return false;
    }
    TheMethods.__DisableForm();
    TheMethods.__GenerateXml();
    return true;
  };

  TheMethods.__GenerateXml = function(){
    this.__DoGenerateXml = this.__DoGenerateXml?this.__DoGenerateXml:function(){
      var TheXml = '<?xml version=\"1.0\"?><f' + Fglobal.Declaratie.Numar;
      TheXml += ' xmlns=\"mfp:anaf:dgti:f' + Fglobal.Declaratie.Numar + ':declaratie:v1\"';
      TheXml += ' value=\"' + this.__Escape(Fglobal.value.rawValue)+ '\"';
      
      TheXml += '>';
      TheXml += '<\/f' + Fglobal.Declaratie.Numar + '>';
      if(Fglobal.TestMode){
        console.show();
        console.println(TheXml);
      } else {
        event.target.removeDataObject("Erori si Avertizari.txt");
        event.target.removeDataObject('f' + Fglobal.Declaratie.Numar + '.xml');
        event.target.createDataObject('f' + Fglobal.Declaratie.Numar + '.xml', TheXml);
      }
    };

    this.__Escape = this.__Escape?this.__Escape:function(AString){
      var TheText = "";
      if(AString != null && typeof AString == "string") {
        TheText = AString.replace(/["]/g,"&quot;");
        TheText = TheText.replace(/[<]/g,"&lt;");
        TheText = TheText.replace(/[>]/g,"&gt;");
        TheText = TheText.replace(/[&]/g,"&amp;");
        TheText = TheText.replace(/[']/g,"&apos;");
      }
      return TheText;
    };

    this.__DoGenerateXml();
  };

  TheMethods.__DisableForm = function(){
    Fglobal.value.access = "readOnly";
    Fglobal.btnValidate.presence = "hidden";
  };

  return TheMethods;
}

