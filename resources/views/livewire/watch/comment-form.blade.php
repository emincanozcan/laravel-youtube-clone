<div class="flex space-x-4 w-full"
     @comment-submit.window="showButtons=false; showButtons=false; setTextareaHeight();"
     x-init="setTextareaHeight(); setCommentButtonActive();"
     x-data="{
    showButtons: false,
    commentButtonActive: false,
    setCommentButtonActive(){
        const textarea = $el.querySelector('textarea');
        this.commentButtonActive = textarea.value.trim().length > 0
    },
    setTextareaHeight() {
      const textarea = $el.querySelector('textarea');
      textarea.style.height = 2 + 'px';
      textarea.style.height = textarea.scrollHeight + 2 + 'px';
    }
}">
    <img class="w-16 h-16 rounded-full" src="{{ auth()->user()->channel->channel_photo_url }}" alt="">
    <div class="flex flex-col flex-1">
        <textarea @input="setTextareaHeight(); setCommentButtonActive();"
                  @click="showButtons = true; setCommentButtonActive();"
                  class="border border-gray-200 resize-none rounded-md shadow-lg text-gray-700"
                  wire:model.defer="body"
                  placeholder="Add a public comment..." rows="1"></textarea>
        <div x-show="showButtons" class="flex justify-end items-center mt-3 space-x-2">
            <button @click="showButtons = false; $el.querySelector('textarea').value = ''"
                    class="px-4 py-2 text-gray-700 font-semibold">CANCEL
            </button>
            <button x-show="commentButtonActive"
                    wire:click="submit"
                    class="bg-blue-600 text-white rounded-sm shadow-sm px-4 py-2 font-semibold">COMMENT
            </button>
            <button disabled x-show="!commentButtonActive"
                    class="bg-gray-200 cursor-default text-gray-600 rounded-sm shadow-sm px-4 py-2 font-semibold">
                COMMENT
            </button>
        </div>
    </div>
</div>
