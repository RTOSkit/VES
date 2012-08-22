

var VES = function(config) {
    config = config || {};
    VES.superclass.constructor.call(this,config);
};

Ext.extend(VES,Ext.Component,{page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {} });

Ext.reg('ves',VES);
var VES = new VES();

