<div id="modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <header class="modal-header">
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close" style="display:block;margin-left:10px"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" ng-bind-html="modal.title"></h4>
            </header>
            <section class="modal-body"></section>
            <footer class="modal-footer" ng-show="modal.footer">
                <button type="button" class="center-block btn btn-primary" ng-click="modal.click(this)">@{{modal.btntext}}</button>
            </footer>
        </div>
    </div>
</div>
