Fglobal = null;
function GetInstance() {
  if(Fglobal) {
    return Fglobal;
  }
  Fglobal = new Object();
  
  Fglobal.Declaratie = {
    Numar: "1234"
  };
  
  Fglobal.TestMode = false;
  
  Fglobal.societate_comerciala = form1.MainForm.content.societate_comerciala;
  Fglobal.localitate = form1.MainForm.content.localitate;
  Fglobal.strada = form1.MainForm.content.strada;
  Fglobal.nr = form1.MainForm.content.nr;
  Fglobal.ap = form1.MainForm.content.ap;
  Fglobal.telefon = form1.MainForm.content.telefon;
  Fglobal.nr_inmatriculare = form1.MainForm.content.nr_inmatriculare;
  Fglobal.cui = form1.MainForm.content.cui;
  Fglobal.reprezentant = form1.MainForm.content.reprezentant;
  Fglobal.calitate_de = form1.MainForm.content.calitate_de;
  Fglobal.tip_amplasare = form1.MainForm.content.tip_amplasare;
  Fglobal.suprafata = form1.MainForm.content.suprafata;
  Fglobal.locuri = form1.MainForm.content.locuri;
  Fglobal.activitate = form1.MainForm.content.activitate;
  Fglobal.start_date = form1.MainForm.content.start_date;
  Fglobal.end_date = form1.MainForm.content.end_date;    
  Fglobal.btnValidate = form1.MainForm.footer.validare;
  Fglobal.footerImport = form1.MainForm.footer.sbfrmImportExport;
  Fglobal.Xml = '';
  
  var TheMethods = FormMethods();
  Fglobal.ExecuteImport = TheMethods.ExecuteImport;
  Fglobal.ExecuteExport = TheMethods.ExecuteExport;
  Fglobal.LoadXmlFromFile = TheMethods.LoadXmlFromFile;
  Fglobal.LoadFormDataFromXml = TheMethods.LoadFormDataFromXml;
  Fglobal.LoadSursaFinBySector = TheMethods.LoadSursaFinBySector;
  Fglobal.ValidateFormData = TheMethods.ValidateFormData;
  Fglobal.__RemoveAttachedFiles = TheMethods.__RemoveAttachedFiles;
  
  return Fglobal;
}

function FormMethods(){
  var TheMethods = new Object();

  TheMethods.ExecuteImport = function(){
    this.__DoExecuteImport = this.__DoExecuteImport?this.__DoExecuteImport:function(){
      this.LoadXmlFromFile();
      this.__ClearFormData();
      this.LoadFormDataFromXml();
    };
    this.__ClearFormData = this.__ClearFormData?this.__ClearFormData:function(){
      // remove attached files
      this.__RemoveAttachedFiles();
      // clear form data
      event.target.resetForm();
    };
    this.__DoExecuteImport();
  };

  TheMethods.ExecuteExport = function(){
    if(!this.ValidateFormData()){
      return;
    }
    event.target.exportDataObject({cName: 'f' + Fglobal.Declaratie.Numar + '.xml', nLaunch: 0});
  };

  TheMethods.LoadXmlFromFile = function(){
    this.__DoLoadXmlFromFile = this.__DoLoadXmlFromFile?this.__DoLoadXmlFromFile:function(){
      if(!event.target.importDataObject('temp.xml')){
        return;
      }
      var TheFileStream = event.target.getDataObjectContents('temp.xml');
      var TheRawXml = util.stringFromStream(TheFileStream, "utf-8");
      this.Xml = this.__CleanupXml(TheRawXml);
    };
    this.__CleanupXml = this.__CleanupXml?this.__CleanupXml:function(AnXml){
      if(!AnXml){
        return "";
      }
      var TheFileIndex = 0;
      var TheEol;  //windows file
      var TheEolIndex;
      var TheNewFile = "";
      if (AnXml.indexOf("\r\n") < 0) {
        TheEol = "\n"; //unix file
      } else {
        TheEol = "\r\n"; //windows file
      }
      while(TheFileIndex < AnXml.length){
        //eliminate BOM character for UTF-8 encoded files
        if ((TheFileIndex == 0) && ((AnXml.charCodeAt(0) == 0xFEFF) || (AnXml.charCodeAt(0) == 0xFFFE))){
          TheFileIndex++;
        }
        TheEolIndex = AnXml.indexOf(TheEol, TheFileIndex);
        if (TheEolIndex > 0){
          TheNewFile += AnXml.substring(TheFileIndex, TheEolIndex);
          TheFileIndex = TheEolIndex + TheEol.length;
        } else {
          TheNewFile += AnXml.substring(TheFileIndex, AnXml.length);
          TheFileIndex = AnXml.length;
        }
      }
      TheNewFile = TheNewFile.replace(/["]/g, "'");
      return TheNewFile;
    };

    this.__DoLoadXmlFromFile();
  };

  TheMethods.LoadFormDataFromXml = function(){
    this.__DoLoadFormDataFromXml = this.__DoLoadFormDataFromXml?this.__DoLoadFormDataFromXml:function(){
      Fglobal.telefon.rawValue = this.__GetAttributeValue(this.Xml, "phone", '');
      Fglobal.cui.rawValue = this.__GetAttributeValue(this.Xml, "cnp", '');
      Fglobal.localitate.rawValue = this.__GetAttributeValue(this.Xml, "city", '');
      Fglobal.strada.rawValue = this.__GetAttributeValue(this.Xml, "streetName", '');
      Fglobal.nr.rawValue = this.__GetAttributeValue(this.Xml, "streetNumber", '');
      Fglobal.ap.rawValue = this.__GetAttributeValue(this.Xml, "apartment", '');
    };

    this.__GetAttributeValue =  this.__GetAttributeValue?this.__GetAttributeValue:function(AnXml, AnAttribute, ADefault){
      var TheAttributeLength = AnAttribute.length + 2;
      var TheValueStart = AnXml.indexOf(AnAttribute + "='", 0);
      if(TheValueStart == -1){
        return ADefault;
      }
      TheValueStart = TheValueStart + TheAttributeLength;
      var TheValueEnd = AnXml.indexOf("'", TheValueStart);
      return AnXml.substr(TheValueStart, TheValueEnd - TheValueStart);
    };

    this.__DoLoadFormDataFromXml();
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
    if(Fglobal.societate_comerciala.rawValue == "" || Fglobal.societate_comerciala.rawValue == null){
      theErrorMessage += "* EROARE - Societatea comerciala este obligatorie!\r\n";
    }
    if(Fglobal.localitate.rawValue == "" || Fglobal.localitate.rawValue == null){
      theErrorMessage += "* EROARE - Localitatea este obligatorie!\r\n";
    }
    if(Fglobal.strada.rawValue == "" || Fglobal.strada.rawValue == null){
      theErrorMessage += "* EROARE - Strada este obligatorie!\r\n";
    }
    if(Fglobal.nr.rawValue == "" || Fglobal.nr.rawValue == null){
      theErrorMessage += "* EROARE - Numarul este obligatoriu!\r\n";
    }
    if(Fglobal.ap.rawValue == "" || Fglobal.ap.rawValue == null){
      theErrorMessage += "* EROARE - Apartamentul este obligatoriu!\r\n";
    }
    if(Fglobal.telefon.rawValue == "" || Fglobal.telefon.rawValue == null){
      theErrorMessage += "* EROARE - Telefonul este obligatoriu!\r\n";
    }
    if(Fglobal.nr_inmatriculare.rawValue == "" || Fglobal.nr_inmatriculare.rawValue == null){
      theErrorMessage += "* EROARE - Numarul de inmatriculare este obligatoriu!\r\n";
    }
    if(Fglobal.cui.rawValue == "" || Fglobal.cui.rawValue == null){
      theErrorMessage += "* EROARE - Codul unic de inregistrare este obligatoriu!\r\n";
    }
    if(Fglobal.reprezentant.rawValue == "" || Fglobal.reprezentant.rawValue == null){
      theErrorMessage += "* EROARE - Reprezentantul este obligatoriu!\r\n";
    }
    if(Fglobal.calitate_de.rawValue == "" || Fglobal.calitate_de.rawValue == null){
      theErrorMessage += "* EROARE - In calitate de este obligatoriu!\r\n";
    }
    if(Fglobal.tip_amplasare.rawValue == "" || Fglobal.tip_amplasare.rawValue == null){
      theErrorMessage += "* EROARE - Specificarea amplasarii este obligatorie este obligatoriu!\r\n";
    }
    if(Fglobal.suprafata.rawValue == "" || Fglobal.suprafata.rawValue == null){
      theErrorMessage += "* EROARE - Suprafata este obligatoriu!\r\n";
    }
    if(Fglobal.locuri.rawValue == "" || Fglobal.locuri.rawValue == null){
      theErrorMessage += "* EROARE - Locurile sunt obligatorii!\r\n";
    }
    if(Fglobal.activitate.rawValue == "" || Fglobal.activitate.rawValue == null){
      theErrorMessage += "* EROARE - Activitatea este obligatorie!\r\n";
    }
    if(Fglobal.start_date.rawValue == "" || Fglobal.start_date.rawValue == null){
      theErrorMessage += "* EROARE - Data de inceput este obligatorie!\r\n";
    }
    if(Fglobal.end_date.rawValue == "" || Fglobal.end_date.rawValue == null){
      theErrorMessage += "* EROARE - Data sfarsit este obligatorie!\r\n";
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
      TheXml += ' societate_comerciala=\"' + this.__Escape(Fglobal.localitate.rawValue)+ '\"';
      TheXml += ' localitate=\"' + this.__Escape(Fglobal.localitate.rawValue)+ '\"';
      TheXml += ' strada=\"' + this.__Escape(Fglobal.strada.rawValue)+ '\"';
      TheXml += ' nr=\"' + this.__Escape(Fglobal.nr.rawValue)+ '\"';
      TheXml += ' ap=\"' + this.__Escape(Fglobal.ap.rawValue)+ '\"';
      TheXml += ' telefon=\"' + this.__Escape(Fglobal.telefon.rawValue)+ '\"';
      TheXml += ' nr_inmatriculare=\"' + this.__Escape(Fglobal.nr_inmatriculare.rawValue)+ '\"';
      TheXml += ' cui=\"' + this.__Escape(Fglobal.cui.rawValue)+ '\"';
      TheXml += ' calitate_de=\"' + this.__Escape(Fglobal.calitate_de.rawValue)+ '\"';
      TheXml += ' tip_amplasare=\"' + this.__Escape(Fglobal.tip_amplasare.rawValue)+ '\"';
      TheXml += ' suprafata=\"' + this.__Escape(Fglobal.suprafata.rawValue)+ '\"';
      TheXml += ' locuri=\"' + this.__Escape(Fglobal.locuri.rawValue)+ '\"';
      TheXml += ' activitate=\"' + this.__Escape(Fglobal.activitate.rawValue)+ '\"';
      TheXml += ' start_date=\"' + this.__Escape(Fglobal.start_date.rawValue)+ '\"';
      TheXml += ' end_date=\"' + this.__Escape(Fglobal.end_date.rawValue)+ '\"';
      
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
    Fglobal.societate_comerciala.access = "readOnly";
    Fglobal.localitate.access = "readOnly";
    Fglobal.strada.access = "readOnly";
    Fglobal.nr.access = "readOnly";
    Fglobal.ap.access = "readOnly";
    Fglobal.telefon.access = "readOnly";
    Fglobal.nr_inmatriculare.access = "readOnly";
    Fglobal.cui.access = "readOnly";
    Fglobal.reprezentant.access = "readOnly";
    Fglobal.calitate_de.access = "readOnly";
    Fglobal.tip_amplasare.access = "readOnly";
    Fglobal.suprafata.access = "readOnly";
    Fglobal.locuri.access = "readOnly";
    Fglobal.activitate.access = "readOnly";
    Fglobal.start_date.access = "readOnly";
    Fglobal.end_date.access = "readOnly";
    Fglobal.btnValidate.presence = "hidden";
    Fglobal.footerImport.presence = "hidden";
  };

  return TheMethods;
}

