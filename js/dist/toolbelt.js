"use strict";

System.register("flagrow/toolbelt/main", [], function (_export, _context) {
  "use strict";

  return {
    setters: [],
    execute: function () {}
  };
});;
'use strict';

System.register('flagrow/toolbelt/search/Source', ['flarum/helpers/highlight'], function (_export, _context) {
    "use strict";

    var highlight, Source;
    return {
        setters: [function (_flarumHelpersHighlight) {
            highlight = _flarumHelpersHighlight.default;
        }],
        execute: function () {
            Source = function () {
                function Source() {
                    babelHelpers.classCallCheck(this, Source);
                }

                babelHelpers.createClass(Source, [{
                    key: 'search',
                    value: function search(type, query) {
                        return app.store.find(type, {
                            filter: { q: query },
                            page: { limit: 5 }
                        });
                    }
                }, {
                    key: 'view',
                    value: function view(query) {
                        query = query.toLowerCase();

                        var results = app.store.all('groups').filter(function (group) {
                            return group.namePlural().toLowerCase().substr(0, query.length) === query;
                        });

                        if (!results.length) return '';

                        return [m(
                            'li',
                            { className: 'Dropdown-header' },
                            app.translator.trans('flagrow-byobu.forum.search.headings.groups')
                        ), results.map(function (group) {
                            var groupName = group.namePlural();
                            var name = highlight(groupName, query);

                            return m(
                                'li',
                                { className: 'SearchResult', 'data-index': 'groups:' + group.id() },
                                m(
                                    'a',
                                    { 'data-index': 'groups:' + group.id() },
                                    m(
                                        'span',
                                        { 'class': 'groupName' },
                                        name
                                    )
                                )
                            );
                        })];
                    }
                }]);
                return Source;
            }();

            _export('default', Source);
        }
    };
});