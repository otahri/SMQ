
<?php
include('menu_debut.php');


?>


<style type="text/css">

#myOverview {
  position: absolute;
  top: 10px;
  left: 10px;
  background-color: aliceblue;
  z-index: 300; /* make sure its in front */
  border: solid 1px blue;

  width:200px;
  height:100px
}

</style>
<script src="jsdiag/go.js"></script>
<script id="code">
  function init() {
    if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
    var $ = go.GraphObject.make;  // for conciseness in defining templates

    myDiagram =
      $(go.Diagram, "myDiagram",  // the DIV HTML element
        {
          initialDocumentSpot: go.Spot.TopCenter,
          initialViewportSpot: go.Spot.TopCenter,
          layout:  // create a TreeLayout
            $(go.TreeLayout,
              {
                treeStyle: go.TreeLayout.StyleLastParents,
                angle: 90,
                layerSpacing: 80,
                alternateAngle: 0,
                alternateAlignment: go.TreeLayout.AlignmentStart,
                alternateNodeIndent: 20,
                alternateNodeIndentPastParent: 1,
                alternateNodeSpacing: 20,
                alternateLayerSpacing: 40,
                alternateLayerSpacingParentOverlap: 1,
                alternatePortSpot: new go.Spot(0, 0.999, 20, 0),
                alternateChildPortSpot: go.Spot.Left
              })
        });

    // define Converters to be used for Bindings
    function theNationFlagConverter(nation) {
      return ;
    }

    function theInfoTextConverter(info) {
      var str = "";
      if (info.Resp) str += "Resp: " + info.Resp;
      if (info.headOf) str += "\n\nEmail: " + info.headOf;
      if (typeof info.boss === "number") {
        
      }
      return str;
    }

    // define the Node template
    myDiagram.nodeTemplate =
      $(go.Node, "Auto",
        { isShadowed: true },
        // the outer shape for the node, surrounding the Table
        $(go.Shape, "Rectangle",
          { fill: "azure" }),
        // a table to contain the different parts of the node
        $(go.Panel, "Table",
          { margin: 4, maxSize: new go.Size(250, NaN) },
          // the two TextBlocks in column 0 both stretch in width
          // but align on the left side
          $(go.RowColumnDefinition,
            {
              column: 0,
              stretch: go.GraphObject.Horizontal,
              alignment: go.Spot.Left
            }),
          // the name
          $(go.TextBlock,
            {
              row: 0, column: 0,
              maxSize: new go.Size(120, NaN),
              margin: 2,
              font: "bold 10pt Helvetica",
              alignment: go.Spot.Top
            },
            new go.Binding("text", "name")),
          // the country flag
          $(go.Picture,
            {
              row: 0, column: 1, margin: 2,
              desiredSize: new go.Size(34, 26),
              imageStretch: go.GraphObject.Uniform,
              alignment: go.Spot.TopRight
            },
            new go.Binding("source", "nation", theNationFlagConverter)),
          // the additional textual information
          $(go.TextBlock,
            {
              row: 1, column: 0, columnSpan: 2,
              font: "10pt Helvetica"
            },
            new go.Binding("text", "", theInfoTextConverter))
        )  // end Table Panel
      );  // end Node

    // define the Link template, a simple orthogonal line
    myDiagram.linkTemplate =
      $(go.Link, go.Link.Orthogonal,
        { selectable: false },
        $(go.Shape, { stroke: '#222' } ));  // the default black link shape


    // set up the nodeDataArray, describing each person/position
    var nodeDataArray = [
      { key: 0, name: "Directeur Général",Resp : "Mr Abdelouahed Jambari", headOf: "ag.arz.jambari@rmawatanya.com" },
        { key: 1, boss: 0, name: "Département Support",  Resp : "Mlle Naima BOUSAID", headOf: "ag.arz.bousaid@rmawatanya.com" },
        { key: 2, boss: 0, name: "Département Communication",  Resp : "Mme Ilham SIBA", headOf: "arz@arzassurances.com" },
          { key: 3, boss: 0, name: "Agent Administratif et de Recouvrement",  Resp : "Mr Aziz BELHOUCINE" },
          { key: 4, boss: 3, name: "Assistante",  Resp : "Mlle Meryem FAZOUAN" },
          { key: 5, boss: 0, name: "Département Particulier et Automobile",  Resp : "Mme Raja JAMBARI", headOf: "ag.arz.raja@rmawatanya.com" },
          { key: 6, boss: 0, name: "Département Prestation",  Resp : "Mr Amine HMIDI", headOf: "ag.arz.amine@rmawatanya.com" },
          { key: 7, boss: 0, name: "Département Entreprise",  Resp : "Mme Yasmine EL MASBAHI", headOf: "ag.arz.yasmine@rmawatanya.com" },
          { key: 8, boss: 5, name: "Conseillers en Assurance",  Resp : "Mlle Sahar TAMSAMANI & Mlle HIND SALHI" },
          { key: 9, boss: 5, name: "Gestionnaire Portefeuille",  Resp : "Mme Hajar KHENNOUSSI"},
          { key: 10, boss: 5, name: "Assistante",  Resp : "Mlle Hasnae BELGAILA"},
          { key: 11, boss: 6, name: "Chargé de Gestion Maladie",  Resp : "Mr Adil LAMAAINI TOILE"},
          { key: 12, boss: 7, name: "Conseillers en Assurance",  Resp : "Mme Rajaa AHMINA" },
          { key: 13, boss: 7, name: "Chargée de Gestion",  Resp : "Mlle Rania SABIR" },
          { key: 14, boss: 7, name: "Assistante",  Resp : "Mme Bouchra SAOUDI"},          







    ];

    // create the Model with data for the tree, and assign to the Diagram
    myDiagram.model =
      $(go.TreeModel,
        { nodeParentKeyProperty: "boss",  // this property refers to the parent node data
          nodeDataArray: nodeDataArray });


    // Overview
    myOverview =
      $(go.Overview, "myOverview",  // the HTML DIV element for the Overview
        { observed: myDiagram });   // tell it which Diagram to show and pan
  }
</script>

<body onload="init()">



<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <span class="current">
                                <i class="glyph-icon icon-home"></i>
                                Accueil
                            </span>
                            
                            
                            
 </div>
 </div>



<div id="page-content">






<h3>
    Accueil
</h3>
<p class="font-gray-dark">
    Diagramme fonctionnel
</p>


<div class="example-box">
    <div class="example-code clearfix">



            <div id="sample" style="position: relative;">
              <div id="myDiagram" style="background-color: white; border: solid 1px black; width: 100%; height: 600px"></div>
              <div id="myOverview"></div> <!-- Styled in a <style> tag at the top of the html page -->
              
            </div>

     </div>
</div>


<?php include('menu_fin.php'); 


?>

