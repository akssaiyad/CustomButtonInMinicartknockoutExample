define([
    'uiComponent',
    'ko',
    'mage/storage',
    'mage/url',
    'jquery/ui'   
], function (Component, ko, storageApi, mageUrl, $) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Aks_CustomFieldInCheckout/custom-button'
        },

        btnContent: ko.observable(''),

        initialize: function () {
            this._super();
            this.fetchButtonContent();
        },

        fetchButtonContent: function () {
            /*let button = document.createElement('button');
            button.className = 'action';
            button.classList.add('primary');
            button.textContent = 'External button';
            this.btnContent(button.outerHTML);*/
            let serviceUrl = mageUrl.build('custombuttoncheckout/index/ajax'),
                self = this;
            storageApi.get(
                serviceUrl
            ).done(function(response){
                self.btnContent(response);
            });
        }
    });
});