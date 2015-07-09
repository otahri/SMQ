<?php
include('menu_debut.php');


?>





  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  
  <link rel="stylesheet" href="css/app.css" type="text/css" />


        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
              <!-- .aside -->
              <aside class="aside-xl b-l b-r" id="note-list">
                <section class="vbox flex">
                  <header class="header clearfix">
                    <span class="pull-right m-t"><button class="btn btn-dark btn-sm btn-icon" id="new-note" data-toggle="tooltip" data-placement="right" title="New"><i class="fa fa-plus"></i></button></span>
                    <p class="h3">Notebook</p>
                    <div class="input-group m-t-sm m-b-sm">
                      <span class="input-group-addon input-sm"><i class="fa fa-search"></i></span>
                      <input type="text" class="form-control input-sm" id="search-note" placeholder="search">
                    </div>
                  </header>
                  <section>
                    <section>
                      <section>
                        <div class="padder">
                          <!-- note list -->
                          <ul id="note-items" class="list-group list-group-sp"></ul>
                            <!-- templates -->
                            <script type="text/template" id="item-template">
                              <div class="view" id="note-<%- id %>">
                                <button class="destroy close hover-action">&times;</button>
                                <div class="note-name">
                                  <strong>
                                  <%- (name && name.length) ? name : 'New note' %>
                                  </strong>
                                </div>
                                <div class="note-desc">
                                  <%- description.replace(name,'').length ? description.replace(name,'') : 'empty note' %>
                                </div>
                                <span class="text-xs text-muted"><%- moment(parseInt(date)).format('MMM Do, h:mm a') %></span>
                              </div>
                            </script>
                            <!-- / template  -->
                          <!-- note list -->
                          <p class="text-center">&nbsp;</p>
                        </div>
                      </section>
                    </section>
                  </section>
                </section>
              </aside>
              <!-- /.aside -->
              <aside id="note-detail">
                <script type="text/template" id="note-template">
                  <section class="vbox">
                    <header class="header bg-light lter bg-gradient b-b">
                      <p id="note-date">Created on <%- moment(parseInt(date)).format('MMM Do, h:mm a') %></p>
                    </header>
                    <section class="bg-light lter">
                      <section class="hbox stretch">
                        <aside>
                          <section class="vbox b-b">
                            <section class="paper">
                                <textarea type="text" class="form-control scrollable" placeholder="Type your note here"><%- description %></textarea>
                            </section>
                          </section>
                        </aside>
                      </section>
                    </section>
                  </section>
                </script>
              </aside>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/app.plugin.js"></script>
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="js/libs/underscore-min.js"></script>
<script src="js/libs/backbone-min.js"></script>
<script src="js/libs/backbone.localStorage-min.js"></script>  
<script src="js/libs/moment.min.js"></script>
<!-- Notes -->
<script src="js/apps/notes.js"></script>






<?php include('menu_fin.php'); 


?>
