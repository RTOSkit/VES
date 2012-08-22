


Ext.onReady(function() {
      Ext.QuickTips.init();
      
 var title = new Ext.BoxComponent({autoEl: {                                           
                                           tag: 'div',                                                                                      
                                           cls: 'ves-title-panel',
                                           html: '<h2> Vectors Engine Server </h2>'
                                           }                                  
                                  });      
      
                                 
  var tab1 = [{
    	        mainItem: 1,
    		id: 'services',		
    		items: [{
                title: 'Wizard Service',
                layout: 'fit',
                iconCls: 'x-icon-tickets',
                tabTip: 'Tickets tabtip',
                style: 'padding: 10px;'
               },{
                xtype: 'portal',
                title: '  Services',
                tabTip: 'Dashboard tabtip',						
                items:[{
                        columnWidth:.33,
                        style:'padding: 10px',																
                        items:[{
                                title: 'Tracing',
                                layout:'fit'
                              },{
                                title: 'Statistics',
                                html: ""
                              }]
                       },{
                           columnWidth:.33,
                           style:'padding:10px 0 10px 10px',
                           items:[{
                                   title: 'Services anchorage (Models)',
                                   html: "snippet select "
                                  },{
                                     title: 'Services anchorage (Processors)',
                                     html: "data snippet select"
                                  }]
                       },{
                          columnWidth:.33,
                          style:'padding:10px',
                          items:[{
                                title: 'Services anchorage (Views)',
                                html: "chunk select"
                          },{
                                title: 'Services connector (Controllers)',
                                html: "select vector"
                          }]
                       }]                    
                },{
                    title: 'Administration',
                    iconCls: 'x-icon-subscriptions',
                    tabTip: 'Subscriptions tabtip',
                    style: 'padding: 10px;',
                    layout: 'fit',
                    items: [{
                            xtype: 'tabpanel',
                            activeTab: 1,
                            items: [{
                                    title: 'Nested Tabs',
                                    html: "dsdswcersafewfw"
                                   }]	
                            }]	
                },{
                    title: 'Accounts',
                    iconCls: 'x-icon-users',
                    tabTip: 'Users tabtip',
                    style: 'padding: 10px;',
                    html: ""			
                }]
            }];                                          

 var tab2 = [{                             
		
                expanded: true,                              
                items: [{
                        title: 'Vectors',
                        iconCls: 'x-icon-configuration',
                        tabTip: 'Configuration tabtip',
                        style: 'padding: 10px;',														
                        html: ""
                        },{
                        title: 'Wizard Vector',
                        iconCls: 'x-icon-templates',
                        tabTip: 'Templates tabtip',
                        style: 'padding: 10px;',
                        html: "hola"
                        }]
	      }];

 var tab3 = [{                             
		
                expanded: true,                              
                items: [{
                        title: '  Security',
                        iconCls: 'x-icon-configuration',
                        tabTip: 'Configuration tabtip',
                        style: 'padding: 10px;',														
                        html: ""
                        },{
                        title: 'Rules',
                        iconCls: 'x-icon-templates',
                        tabTip: 'Templates tabtip',
                        style: 'padding: 10px;',
                        html: "hola"
                        },{
                        title: 'Users',
                        iconCls: 'x-icon-templates',
                        tabTip: 'Templates tabtip',
                        style: 'padding: 10px;',
                        html: "hola"
                        }
                    ]
	      }];
          
 var tab4 = [{                             
		
                expanded: true,                              
                items: [{
                        title: 'Configuration',
                        iconCls: 'x-icon-configuration',
                        tabTip: 'Configuration tabtip',
                        style: 'padding: 10px;',														
                        html: ""
                        },{
                        title: 'Panel Set',
                        iconCls: 'x-icon-templates',
                        tabTip: 'Templates tabtip',
                        style: 'padding: 10px;',
                        html: "hola"
                        },{
                        title: 'System Checks',
                        iconCls: 'x-icon-templates',
                        tabTip: 'Templates tabtip',
                        style: 'padding: 10px;',
                        html: "hola"
                        },{
                        title: 'Status',
                        iconCls: 'x-icon-templates',
                        tabTip: 'Templates tabtip',
                        style: 'padding: 10px;',
                        html: "hola"
                        }
                    ]
	      }];          

  VES.groupPanel = Ext.extend(Ext.ux.GroupTabPanel, {

       setIconGroup: function(groupEl,iconCls){
       
           groupEl = this.getGroupEl(groupEl);            
           Ext.fly(groupEl).addClass(iconCls);
           this.syncTabJoint();
       } 


   });
   
   Ext.reg('ves-grouppanel', VES.groupPanel);
    
    
 VES.panel.Desktop = function(config) {
   config = config || {};
   Ext.apply(config,{
          items: [ title,{            
                            layout: 'fit',
                            id: "ves_desktop_port",
                            style: 'border: 0',
                            items: [
                                    {
                                    xtype: 'ves-grouppanel',            
                                    tabWidth: 130,
                                    activeGroup: 0,                
                                    items: [ tab1,tab2,tab3,tab4]
                                    ,
                                    listeners: {
                                     render: function() {                                        
                                        this.setIconGroup(0,'x-grouptabs-tab-icon-p1');
                                        this.setIconGroup(1,'x-grouptabs-tab-icon-p2');
                                        this.setIconGroup(2,'x-grouptabs-tab-icon-p3');
                                        this.setIconGroup(3,'x-grouptabs-tab-icon-p4');                    
                                     }
                                    }                                   
                                   }]
                             }]
                  }       
     
   
   );

    VES.panel.Desktop.superclass.constructor.call(this,config);
    

};


Ext.extend(VES.panel.Desktop,MODx.Panel);
Ext.reg('ves-panel-desktop',VES.panel.Desktop);


 



});