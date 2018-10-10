Fglobal = null;

function GetInstance() {
  if(Fglobal) {
    return Fglobal;
  }
  Fglobal = new Object();
  
  Fglobal.Declaratie = {
    Numar: "1234"
  };
  
  Fglobal.TestMode = true;
  
  Fglobal.localitate = form1.MainForm.content.localitate;
  Fglobal.strada = form1.MainForm.content.strada;
  Fglobal.nr = form1.MainForm.content.nr;
  Fglobal.ap = form1.MainForm.content.ap;
  Fglobal.telefon = form1.MainForm.content.telefon;
  Fglobal.cui = form1.MainForm.content.cui;
  Fglobal.judet = form1.MainForm.content.judet;
  Fglobal.plic = form1.MainForm.content.plic;
  Fglobal.ctr_inchiriere = form1.MainForm.content.ctr_inchiriere;
  Fglobal.xerox_buletin = form1.MainForm.content.xerox_buletin;
  Fglobal.viza_chirie = form1.MainForm.content.viza_chirie;
  Fglobal.declaratie_notariala = form1.MainForm.content.declaratie_notariala;
  Fglobal.casatorie = form1.MainForm.content.casatorie;
  Fglobal.nrChirie = form1.MainForm.content.nrChirie;
  Fglobal.apChirie = form1.MainForm.content.apChirie;
  Fglobal.stradaChirie = form1.MainForm.content.stradaChirie;
  Fglobal.nume = form1.MainForm.content.nume;
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
      Fglobal.judet.rawValue = this.__GetAttributeValue(this.Xml, "region", '');
      Fglobal.nume.rawValue = this.__GetAttributeValue(this.Xml, "name", '');
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
    if(Fglobal.nume.rawValue == "" || Fglobal.nume.rawValue == null){
      theErrorMessage += "* EROARE - Numele este obligatoriu!\r\n";
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
    if(Fglobal.judet.rawValue == "" || Fglobal.judet.rawValue == null){
      theErrorMessage += "* EROARE - Judetul este obligatoriu!\r\n";
    }
    if(Fglobal.plic.rawValue == "" || Fglobal.plic.rawValue == null){
      theErrorMessage += "* EROARE - Dosar plic este obligatoriu!\r\n";
    }
    if(Fglobal.ctr_inchiriere.rawValue == "" || Fglobal.ctr_inchiriere.rawValue == null){
      theErrorMessage += "* EROARE - Contractul de inchiriere este obligatoriu!\r\n";
    }
    if(Fglobal.xerox_buletin.rawValue == "" || Fglobal.xerox_buletin.rawValue == null){
      theErrorMessage += "* EROARE - Copie xerox dupa cartile/buletinele de identitate ale titularului si sotiei(sotului) este obligatoriu!\r\n";
    }
    if(Fglobal.viza_chirie.rawValue == "" || Fglobal.viza_chirie.rawValue == null){
      theErrorMessage += "* EROARE - Viza de chirie achitata la zi pe cererea tip este obligatoriu!\r\n";
    }
    if(Fglobal.declaratie_notariala.rawValue == "" || Fglobal.declaratie_notariala.rawValue == null){
      theErrorMessage += "* EROARE - Declaratie notariala conform H.C.L nr 363/27.09.2012 este obligatoriu!\r\n";
    }
    if(Fglobal.nrChirie.rawValue == "" || Fglobal.nrChirie.rawValue == null){
      theErrorMessage += "* EROARE - Numarul la care se doreste locuinta este obligatoriu!\r\n";
    }
    if(Fglobal.stradaChirie.rawValue == "" || Fglobal.stradaChirie.rawValue == null){
      theErrorMessage += "* EROARE - Strada la care se doreste locuinta este obligatorie!\r\n";
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
      TheXml += ' nume=\"' + this.__Escape(Fglobal.nume.rawValue)+ '\"';
      TheXml += ' localitate=\"' + this.__Escape(Fglobal.localitate.rawValue)+ '\"';
      TheXml += ' strada=\"' + this.__Escape(Fglobal.strada.rawValue)+ '\"';
      TheXml += ' nr=\"' + this.__Escape(Fglobal.nr.rawValue)+ '\"';
      TheXml += ' ap=\"' + this.__Escape(Fglobal.ap.rawValue)+ '\"';
      TheXml += ' telefon=\"' + this.__Escape(Fglobal.telefon.rawValue)+ '\"';
      TheXml += ' cui=\"' + this.__Escape(Fglobal.cui.rawValue)+ '\"';
      TheXml += ' judet=\"' + this.__Escape(Fglobal.judet.rawValue)+ '\"';
      TheXml += ' plic=\"' + this.__Escape(Fglobal.plic.rawValue)+ '\"';
      TheXml += ' ctr_inchiriere=\"' + this.__Escape(Fglobal.ctr_inchiriere.rawValue)+ '\"';
      TheXml += ' xerox_buletin=\"' + this.__Escape(Fglobal.xerox_buletin.rawValue)+ '\"';
      TheXml += ' viza_chirie=\"' + this.__Escape(Fglobal.viza_chirie.rawValue)+ '\"';
      TheXml += ' declaratie_notariala=\"' + this.__Escape(Fglobal.declaratie_notariala.rawValue)+ '\"';
      TheXml += ' casatorie=\"' + this.__Escape(Fglobal.casatorie.rawValue)+ '\"';
      TheXml += ' nrChirie=\"' + this.__Escape(Fglobal.nrChirie.rawValue)+ '\"';
      TheXml += ' apChirie=\"' + this.__Escape(Fglobal.apChirie.rawValue)+ '\"';
      TheXml += ' stradaChirie=\"' + this.__Escape(Fglobal.stradaChirie.rawValue)+ '\"';
      
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
    Fglobal.nume.access = "readOnly";
    Fglobal.localitate.access = "readOnly";
    Fglobal.strada.access = "readOnly";
    Fglobal.nr.access = "readOnly";
    Fglobal.ap.access = "readOnly";
    Fglobal.telefon.access = "readOnly";
    Fglobal.judet.access = "readOnly";
    Fglobal.cui.access = "readOnly";
    Fglobal.plic.access = "readOnly";
    Fglobal.ctr_inchiriere.access = "readOnly";
    Fglobal.xerox_buletin.access = "readOnly";
    Fglobal.viza_chirie.access = "readOnly";
    Fglobal.declaratie_notariala.access = "readOnly";
    Fglobal.casatorie.access = "readOnly";
    Fglobal.nrChirie.access = "readOnly";
    Fglobal.apChirie.access = "readOnly";
    Fglobal.stradaChirie.access = "readOnly";
    Fglobal.btnValidate.presence = "hidden";
    Fglobal.footerImport.presence = "hidden";
  };

  return TheMethods;
}
