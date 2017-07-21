<div id="modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <header class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">@{{modal.title}}</h4>
            </header>
            <section class="modal-body" ng-bind-html="modal.body"></section>
            <footer class="modal-footer">
                <button type="button" class="center-block btn btn-@{{modal.type}}" ng-click="modalclick()">@{{modal.btntext}}</button>
            </footer>
        </div>
    </div>
</div>
