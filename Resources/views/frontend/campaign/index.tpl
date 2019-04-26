{extends file='parent:frontend/home/index.tpl'}

{* Promotion *}
{block name='frontend_home_index_promotions'}
    {foreach $landingPage.emotions as $emotion}
        <div class="content--emotions">
            <div class="emotion--wrapper"
                 data-controllerUrl="{url module=widgets controller=emotion action=index emotionId=$emotion.id controllerName=$Controller}"
                 data-availableDevices="{$emotion.devices}">
            </div>
        </div>
    {/foreach}
{/block}
