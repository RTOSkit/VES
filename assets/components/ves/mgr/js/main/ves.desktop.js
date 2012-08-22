
Ext.onReady(function() {
    MODx.load({ xtype: 'ves-page-desktop'});
});



VES.page.Desktop = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'ves-panel-desktop'
            ,renderTo: 'ves-panel-desktop-div'
        }]
    }); 
    VES.page.Desktop.superclass.constructor.call(this,config);
};


Ext.extend(VES.page.Desktop,MODx.Component);
Ext.reg('ves-page-desktop',VES.page.Desktop);  

