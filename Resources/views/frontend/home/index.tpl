{extends file='parent:frontend/home/index.tpl'}

{* Promotion *}
{*block name='frontend_home_index_promotions'}
    {if $hasCustomerStreamEmotion}
        {action module=frontend controller=listing action=layout sCategory=$sCategoryContent.id}
    {elseif $hasEmotion}
        <div class="content--emotions">
            {foreach $emotions as $emotion}
                {block name='frontend_home_index_emotion_wrapper'}
                    <div class="emotion--wrapper"
                         data-controllerUrl="{url module=widgets controller=emotion action=index emotionId=$emotion.id controllerName=$Controller}"
                         data-availableDevices="{$emotion.devices}">
                    </div>
                {/block}
            {/foreach}
        </div>
    {/if}
{/block*}
