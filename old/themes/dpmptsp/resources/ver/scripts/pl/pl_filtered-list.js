PULSE.app.templates.manager='{{#active }}<tr class="tableLight">{{/active}} {{^active}}</tr><tr>{{/active}}<td><a href="{{ url }}" class="managerName">{{ displayName }}</a></td><td>{{^noDisplayClub}} <a href="{{ clubUrl }}"><span alt="" class="badge-25 {{ optaId }}"></span> <span class="long">{{ clubName }}</span> <span class="short">{{ clubShortName }}</span> </a>{{/noDisplayClub}} {{#noDisplayClub}} - {{/noDisplayClub}}</td><td class="hide-s"><span alt="" class="flag {{ nationalCode }}"></span> <span class="playerCountry">{{ nationalName }}</span></td></tr>',PULSE.app.templates.nodatalist='<tr><th><span class="noContentContainer">{{ label }}</span></th></tr>',PULSE.app.templates.player='<tr><td><a href="{{ url }}" class="playerName"><img class="img playerPhotoContainer" alt="" data-player="{{ optaId }}" data-size="{{ imageSize }}" src="{{ playerImage }}">{{ displayName }}</a></td><td class="hide-s">{{ position }}</td><td class="hide-s">{{#nationalCode}} <span class="flag {{ nationalCode }}"></span> {{/nationalCode }} <span class="playerCountry">{{ nationalName }}</span></td></tr>',PULSE.app.templates.referee='{{#active }}<tr class="tableLight">{{/active}} {{^active}}</tr><tr>{{/active}}<td><a href="{{ url }}" class="managerName">{{ displayName }}</a></td><td>{{ appearances }}</td><td>{{ redCards }}</td><td>{{ yellowCards }}</td></tr>',PULSE.app.templates.teamCard='<li><a href="{{ url }}" class="indexItem {{ optaId }}"><div class="indexImg"><svg class="mob-heroSvg clubColourSvg" data-name="Layer 1" xmlns="//www.w3.org/2000/svg" width="170" height="40" viewBox="0 0 343 79"><path class="fill" d="M3998,4894l51.91,18-1,5.29c75.27,22.9,152.4,34.56,231.23,40.06-0.44,2-.81,3.87-1.26,5.7s-1,3.77-1.78,6.41c7.79,0.53,15.17,1.17,22.57,1.51,12.14,0.56,24.29.9,36.43,1.38,1.65,0.07,3.28.42,4.92,0.64H3998v-79Z" transform="translate(-3998 -4894)"></path></svg></div><div class="indexBadge"><span alt="" class="badge-50 {{ optaId }}"></span></div><div class="indexInfo clubColourBg"><div class="indexBadge-mob"><span alt="" class="badge-25 {{ optaId }}"></span></div><div class="clubName">{{ displayName }}</div><div class="stadiumName"><span class="icn stadium-w"></span>{{ stadiumName }}</div><div class="btn clubColourBtn">{{labelClubHome}}<span class="icn arrow-right-w"></span></div></div></a></li>',PULSE.app.templates.teamList='<tr><td class="team"><a href="{{ url }}"><span alt="" class="badge-25 {{ clubAbbr }}"></span>{{ displayName }}</a></td><td class="venue"><span class="icn stadium"></span>{{ stadiumName }}<span class="icn arrow-right"></span></td></tr>',PULSE.app.templates.nocontentlist='<li class="noContentContainer">{{ label }}</li>',PULSE.app.templates.photo='<li><div class="thumbnail"><figure>{{#variant}} <span class="image"><img src="{{ url }}" alt="{{ title }}"> </span>{{/variant}}</figure></div></li>',PULSE.app.templates.playlist='<li><a href="{{ url }}" class="thumbnail albumThumb"><figure><span class="image"><div class="ginfo"><span class="icn photo-w"></span><span class="count">{{ itemsSize }}</span></div>{{#variant}} <span class="image"><img src="{{ url }}" alt="{{ title }}"> </span>{{/variant}}</span><figcaption><span class="title">{{ title }}</span></figcaption></figure></a></li>',PULSE.app.templates.relatedcontent='{{#hotlinkUrl}} <a href="{{ articleUrl }}?utm_source=premier-league-website&utm_campaign=website&utm_medium=link" target="_blank" class="relatedArticle club">{{/hotlinkUrl}} {{^hotlinkUrl}} <a href="{{ articleUrl }}" class="relatedArticle club">{{/hotlinkUrl}} {{#optaId}} <span class="badge-25 {{ optaId }}"></span> {{/optaId}}<p>{{ title }} {{#optaId}} <span alt="" class="icn external-d"></span> {{/optaId}}</p></a></a>',PULSE.app.templates.text='<li><section class="featuredArticle"><div class="col-8-m">{{#hotlinkUrl}} <a href="{{ articleUrl }}?utm_source=premier-league-website&utm_campaign=website&utm_medium=link" target="_blank" class="thumbnail thumbLong">{{/hotlinkUrl}} {{^hotlinkUrl}} <a href="{{ articleUrl }}" class="thumbnail thumbLong">{{/hotlinkUrl}}<figure>{{#variant}} <span class="image thumbCrop-news-list"><img src="{{ url }}" alt="{{ title }}"> </span>{{/variant}}<figcaption>{{#subtitle}} <span class="tag">{{ subtitle }}</span> {{/subtitle}} <span class="title">{{ title }}</span> <span class="text">{{ description }}</span></figcaption></figure></a></a></div><div class="col-4-m"><div class="relatedArticles">{{#related}}<div class="relatedArticleContainer" data-id="{{ id }}" data-type="{{ type }}"></div>{{/related}}</div></div></section></li>',PULSE.app.templates.texthorizontal='<li><a href="{{ articleUrl }}" class="thumbnail"><figure>{{#variant}} <span class="image"><img src="{{ url }}" alt="{{ title }}"> </span>{{/variant}}<figcaption>{{#subtitle}} <span class="tag">{{ subtitle }}</span> {{/subtitle}} <span class="title">{{ title }}</span></figcaption></figure></a></li>',PULSE.app.templates.video='<li data-ui-modal="#videoPlayer" data-ui-args="{{uiArgs}}"><a href="#!" class="thumbnail videoThumb"><figure><span class="image thumbCrop-video-small">{{#variant}} <img src="{{url}}" alt=""> {{/variant}} <span class="runTime"><span class="icn play"></span><time datetime="PT2M59S">{{durationString}}</time></span></span><figcaption><span class="title">{{title}}</span></figcaption></figure></a></li>',PULSE.app.templates.clubstandings='{{#table}}<tr class="{{ rowClass }}"><td class="pos">{{ position }} <span class="movement {{ movement }}"></span></td><td class="team"><a href="{{ url }}"><span class="badge-20 {{ team.altIds.opta }}"></span> <span class="long">{{ teamName }}</span> <span class="short">{{ teamName }}</span></a></td><td>{{ overall.played }}</td><td>{{ overall.goalsDifference}}</td><td class="points">{{ overall.points }}</td></tr>{{/table}}',PULSE.app.templates.fixturelistbroadcaster='{{#multipleBroadcasters}}<div class="multipleBroadcastersContainer"><span class="broadcaster multiple"><span class="icn tv-d"></span> <span class="js-multipleBroadcasters-{{fixtureId}} multipleBroadcastersButton" tabindex="0">{{ multipleBroadcasters }}<span class="visuallyHidden">Open multiple broadcasters modal</span></span></span></div>{{/multipleBroadcasters}} {{^multipleBroadcasters}} <span class="broadcaster">{{ liveOnLabel }} <span alt="{{ name }} Logo" class="logo broadcaster-{{ abbreviation }}"><span class="visuallyHidden">External link to {{ name }}</span><span class="broadcaster-text">{{ name }}</span> </span></span>{{/multipleBroadcasters}} {{#hasLiveStream}} <span class="icn livestream"></span><span class="visuallyHidden">Live stream available for this match.</span> {{/hasLiveStream}}',PULSE.app.templates.fixturemodalmatch='<div class="match"><p class="date">{{ matchDate }}</p><p class="league">{{ gameweek.compSeason.competition.description }}</p><a href="{{ url }}" class="matchAbridged"><span class="teamName">{{ teams.0.team.club.abbr }}</span> <span class="badge-20 {{ teams.0.opta }}"></span> <span class="score">{{ teams.0.score }} <span>-</span>{{ teams.1.score }}</span> <span class="badge-20 {{ teams.1.opta }}"></span> <span class="teamName">{{ teams.1.team.club.abbr }}</span> <span class="icn arrow-right"></span></a></div>',PULSE.app.templates.fixturemodalstandings='{{#table}}<tr><td class="pos">{{ position }} <span class="movement {{ movement }}"></span></td><td class="team"><a href="{{ url }}"><span class="badge-20 {{ team.altIds.opta }}"></span>{{ teamName }}</a></td><td>{{ overall.played }}</td><td>{{ overall.goalsDifference}}</td><td class="points">{{ overall.points }}</td></tr>{{/table}}',PULSE.app.templates.fullmatchday='<time class="date long" datetime="{{date}}"><strong>{{longDate}}</strong></time> <time class="date short" datetime="{{date}}"><strong>{{shortDate}}</strong></time><div data-competition-matches-list="{{date}}"></div>',PULSE.app.templates.matchitembase='{{#wrap}}<li class="matchFixtureContainer" data-home="{{#getShortName}}0{{/getShortName}}" data-away="{{#getShortName}}1{{/getShortName}}" data-competition="{{fixture.gameweek.compSeason.competition.description}}" data-venue="{{#getVenueName}}{{/getVenueName}}" data-comp-match-item="{{fixture.id}}" data-comp-match-item-ko="{{fixture.kickoff.millis}}" data-comp-match-item-status="{{fixture.status}}">{{/wrap}} {{#isPL}}<div data-template-rendered data-href="{{#getMatchUrl}}{{/getMatchUrl}}" class="fixture {{#getClassForState}}{{fixture.status}}{{/getClassForState}}" data-matchid="{{fixture.id}}" tabindex="0">{{/isPL}} {{^isPL}}<div data-template-rendered class="fixture {{#getClassForState}}{{fixture.status}}{{/getClassForState}}">{{/isPL}} <span class="overview">{{#live}} <span class="minutes"><strong>{{#getMatchTime}}{{/getMatchTime}}</strong> </span>{{/live}} {{#abandoned}} <span class="minutes"><strong></strong> </span>{{/abandoned}} <span class="teams"><span class="team"><span class="teamName">{{#getShortName}}0{{/getShortName}} </span><span alt="" class="badge-25 {{#getOpta}}0{{/getOpta}}"></span> </span>{{#renderTeamsDivider}}{{/renderTeamsDivider}} <span class="team"><span alt="" class="badge-25 {{#getOpta}}1{{/getOpta}}"></span> <span class="teamName">{{#getShortName}}1{{/getShortName}} </span></span>{{#shootout}} <span class="penalties"><p>{{penScore.0}}-{{penScore.1}} {{ onPenaltiesLabel }}</p></span>{{/shootout}} </span>{{#venue}} <span class="stadiumName"><span class="icn stadium"></span> {{#getVenueName}}{{/getVenueName}} </span>{{/venue}} {{#hasOfficials}} <span class="referees">{{#officials}} <span class="ref"><span class="refLabelMobile">{{ roleShort }}: </span>{{ name.display }}</span> {{/officials}} </span>{{/hasOfficials}} {{#isPL}} <span class="fixtureBroadcast broadcastDataContainer"></span> <span class="icn arrow-right"></span> {{/isPL}}</span></div>{{#upcoming}} {{#isPL}} {{^hasOfficials}} <span data-ui-modal="#quickviewModal" data-ui-args="{{ matchJson }}" class="btn quickView" role="button">{{ quickviewLabel }}</span> {{/hasOfficials}} {{/isPL}} {{/upcoming}} {{#wrap}}</div></li>{{/wrap}}',PULSE.app.templates.matchitemdetails='<span class="matchDetails"><ul class="teamEvents home"><li><span class="icon"><span class="icn ball"></span></span><div class="info"><span class="player"><strong>Lukaku</strong> (<strong>18</strong>)</span> <span class="assist">Ast. Deulofeu</span></div></li><li><span class="icon"><span class="icn card-red"></span></span> <span class="info"><span class="player"><strong>Howard</strong> (<strong>23</strong>)</span></span></li></ul><ul class="teamEvents away"><li><span class="icon"><span class="icn ball"></span></span> <span class="info"><span class="player"><strong>Diego Costa</strong> (<strong>34</strong>)</span> <span class="assist">Ast. Willian</span></span></li><li><span class="icon"><span class="icn ball"></span></span> <span class="info"><span class="og">OG</span> <span class="player"><strong>Hutton</strong> (<strong>54</strong>)</span> <span class="assist">Ast. Diego Costa</span></span></li></ul></span>',PULSE.app.templates.matchlist='{{#comp}}<div class="competition right"><span class="competitionImage{{ comp.id }}"></span><span class="competitionLabel{{ comp.id }}">{{ comp.description }}</span></div>{{/comp}} {{#refModel}}<header class="refereeHeader"><div class="match">{{ matchLabel }}</div><div class="referees"><div class="ref">{{ refLabel }}</div><div class="ref">{{ asstLabel1 }}</div><div class="ref">{{ asstLabel2 }}</div><div class="ref">{{ asstLabel3 }}</div></div></header>{{/refModel}}<ul class="matchList"></ul>',PULSE.app.templates.nodatafixture='<div class="noContentContainer">{{ label }}</div>',PULSE.app.templates.quickviewheader='<div class="fixturesHeader"><div class="match-info"><a href="{{ teams.0.url }}" class="team-one"><h4>{{ teams.0.team.name }}</h4><span class="logoContainer"><span alt="" class="badge-25 {{ teams.0.opta }}"></span></span></a><div class="match-time"><p>{{ kickOffTime }}</p></div><a href="{{ teams.1.url }}" class="team-two"><span class="logoContainer"><span alt="" class="badge-25 {{ teams.1.opta }}"></span></span><h4>{{ teams.1.team.name }}</h4></a></div></div><div class="match-links"><div class="col-4-m">{{#groundLink}} <a href="{{ groundLink }}" class="btn" role="btn"><span class="icn stadium"></span>{{ stadiumInfoLabel }}<span class="icn arrow-right"></span></a> {{/groundLink}}</div><div class="col-4-m"><a href="{{ url }}" class="btn-highlight" role="btn">{{ viewMatchLabel }}<span class="icn arrow-right-w"></span></a></div></div><div class="past-matches"><div class="team-one-past"><span alt="" class="badge-25 {{ teams.0.opta }}"></span><h5>{{ teams.0.team.club.shortName }} - {{ previousResulsLabel }}</h5><div class="matchTeamForm{{ teams.0.team.id}}">{{{ loaderHtml }}}</div></div><div class="team-two-past"><span alt="" class="badge-25 {{ teams.1.opta }}"></span><h5>{{ teams.1.team.club.shortName }} - {{ previousResulsLabel }}</h5><div class="matchTeamForm{{ teams.1.team.id}}">{{{ loaderHtml }}}</div></div><div class="premier-league"><div class="premier-league-col"><div class="competition"><span class="competitionImage{{ gameweek.compSeason.competition.id }}"></span><span class="competitionLabel{{ gameweek.compSeason.competition.id }}">{{ gameweek.compSeason.competition.description }}</span><h5>{{ standingsLabel }}</h5></div><div class="standingsAbridged"><div class="table"><table class="standings-table"><thead><tr><th class="pos">{{ tableLabels.pos }}</th><th class="team">{{ tableLabels.team }}</th><th>{{ tableLabels.pl }}</th><th>{{ tableLabels.gd }}</th><th>{{ tableLabels.pts }}</th></tr></thead><tbody class="matchStandingsContainer"></tbody></table></div></div></div><div class="premier-league-col"><h5 class="previous-meetings">{{ previousMeetingsLabel }}</h5><div class="matchPreviousMeetingsContainer">{{{ loaderHtml }}}</div></div></div></div>',PULSE.app.templates.expandedgraphview='<div class="expandableTeam"><a class="expandablebadge-50" href="#!"><span alt="" class="badge-25 {{optaId}}"></span></a><div class="teamInfo" href="#!"><span class="teamName">{{name}}</span> <span class="teamPitch"><span class="icn stadium"></span>Goodison Park</span></div></div><div class="teamPerformanceStandingsContainer"></div><div class="expandableFixtures"><div class="resultWidget">Latest Result - Saturday 12 September <a href="#!" class="matchAbridged"><span class="teamName">CRY</span> <span alt="" class="badge-25 CRY"></span> <span class="score">1 <span>-</span>2</span> <span alt="" class="badge-25 SOU"></span> <span class="teamName">SOU</span> <span class="icn arrow-right"></span></a></div><div class="resultWidget">Next Fixture - Saturday 12 September <a href="#!" class="matchAbridged"><span class="teamName">CRY</span> <span alt="" class="badge-25 CRY"></span> <span class="score">1 <span>-</span>2</span> <span alt="" class="badge-25 SOU"></span> <span class="teamName">SOU</span> <span class="icn arrow-right"></span></a></div><div class="btn-highlight" role="btn">Visit Club Page<span class="icn arrow-right-w"></span></div></div><table class="overallStats"><thead><tr><th>Goals Scored</th><th>Goals C/ded</th><th>Avg. Goals/M</th></tr></thead><tbody><tr><td>{{stats.gs}}</td><td>{{stats.gc}}</td><td>{{stats.ag}}</td></tr></tbody><thead><tr><th>Home Win %</th><th>Away Win %</th><th>Overall Win %</th></tr></thead><tbody><tr><td>{{stats.hw}}<span class="percentSize">%</span></td><td>{{stats.hw}}<span class="percentSize">%</span></td><td>{{stats.hw}}<span class="percentSize">%</span></td></tr></tbody></table><div class="performanceWidgetArea"><div id="curve_chart" style="width: 100%; height: 20rem"></div></div><table class="overallStatsAbridged"><thead><tr><th>Avg. Goals/M</th><th>Home Win %</th><th>Away Win %</th><th>Overall Win %</th></tr></thead><tbody><tr><td>{{stats.ag}}</td><td>{{stats.hw}}<span class="percentSize">%</span></td><td>{{stats.aw}}<span class="percentSize">%</span></td><td>{{stats.ow}}<span class="percentSize">%</span></td></tr></tbody></table>',PULSE.app.templates.expandedstats="",PULSE.app.templates.filtertable='<div class="wrapper col-12"><div class="tableContainer" data-round="{{ roundId }}">{{#groupName}}<h3 class="subHeader">{{ groupName }}</h3>{{/groupName}}<div class="table wrapper col-12"><table><summary class="visuallyHidden">{{ tableSummaryLabel }}</summary><thead><tr>{{#isPL}}<th class="revealMoreHeader text-centre" style="display:none" scope="col">{{ moreLabel }}</th>{{/isPL}}<th class="text-centre" scope="col"><div class="thFull">{{ positionLabel.long }}</div><div class="thShort">{{ positonLabel.short }}</div></th><th class="team" scope="col">{{ clubLabel }}</th><th scope="col"><div class="thFull">{{ playedLabel.long }}</div><div class="thShort">{{ playedLabel.short }}</div></th><th scope="col"><div class="thFull">{{ wonLabel.long }}</div><div class="thShort">{{ wonLabel.short }}</div></th><th scope="col"><div class="thFull">{{ drewLabel.long }}</div><div class="thShort">{{ drewLabel.short }}</div></th><th scope="col"><div class="thFull">{{ lostLabel.long }}</div><div class="thShort">{{ lostLabel.long }}</div></th><th class="hideSmall" scope="col"><abbr title="{{ goalsForLabel.long }}">{{ goalsForLabel.short }}</abbr></th><th class="hideSmall" scope="col"><abbr title="{{ goalsAgainstLabel.long }}">{{ goalsAgainstLabel.short }}</abbr></th><th scope="col"><abbr title="{{ goalDifferenceLabel.long }}">{{ goalDifferenceLabel.short }}</abbr></th><th scope="col" class="points"><div class="thFull">{{ pointsLabel.long }}</div><div class="thShort">{{ pointsLabel.short }}</div></th>{{#hasForms}}<th class="teamForm hideMed" scope="col">{{ formLabel }}</th>{{/hasForms}} {{#hasNextMatches}}<th class="hideMed text-centre" scope="col">{{ nextLabel }}</th>{{/hasNextMatches}}</tr></thead><tbody class="tableBodyContainer">{{#rows}} {{#upIdx}}{{/upIdx}}<tr class="{{#getRowClass}}{{/getRowClass}}" data-compseason="{{ compSeason }}" data-filtered-entry-size="{{ entrySize }}" data-filtered-table-row="{{team.id}}" data-filtered-table-row-name="{{team.name}}" data-filtered-table-row-abbr="{{team.club.abbr}}">{{#isPL}}<td class="revealMore" style="display: table-cell" tabindex="0" role="button"><div class="icn chevron-down-g"></div></td>{{/isPL}}<td class="pos button-tooltip" tabindex="0" id="Tooltip" role="tooltip"><span class="value">{{#getIdx}}{{/getIdx}}</span> <span class="movement {{#getMoveClass}}{{/getMoveClass}}"><span class="tooltipContainer tooltip-left" role="tooltip"><span class="tooltip-content">{{ lastPositionLabel }} <span class="resultHighlight">{{startingPosition}}</span></span></span></span></td><td class="team" scope="row">{{#renderLink}} <a href="{{ link }}"><span alt="" class="badge-25 {{team.altIds.opta}}"></span><span class="long">{{name}}</span> <span class="short">{{team.club.abbr}}</span></a> {{/renderLink}} {{^renderLink}}<div><span alt="" class="badge-25 {{team.altIds.opta}}"></span><span class="long">{{name}}</span> <span class="short">{{team.club.abbr}}</span></div>{{/renderLink}}</td><td>{{#getMetric}}played{{/getMetric}}</td><td>{{#getMetric}}won{{/getMetric}}</td><td>{{#getMetric}}drawn{{/getMetric}}</td><td>{{#getMetric}}lost{{/getMetric}}</td><td class="hideSmall">{{#getMetric}}goalsFor{{/getMetric}}</td><td class="hideSmall">{{#getMetric}}goalsAgainst{{/getMetric}}</td><td>{{#getMetric}}goalsDifference{{/getMetric}}</td><td class="points">{{#getMetric}}points{{/getMetric}}</td>{{#hasForms}}<td class="form hideMed"><ul>{{#teamForm}}<li tabindex="0" class="{{ outcome.class }} button-tooltip" id="Tooltip" role="tooltip">{{ outcome.short }} <a href="{{ url }}" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="resultHighlight">{{ outcome.long }}</span> {{ matchDate }} </span><span class="teamName">{{ teams.0.team.name }} </span><span class="badge-20 {{ teams.0.team.altIds.opta }}"></span> <span class="score">{{ teams.0.score }}<span>-</span>{{ teams.1.score }} </span><span class="badge-20 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName">{{ teams.1.team.name }} </span><span class="icn arrow-right"></span></span></span></a></li>{{/teamForm}}</ul></td>{{/hasForms}} {{#hasNextMatches}}<td class="nextMatchCol hideMed">{{#nextMatch}} <span tabindex="0" class="button-tooltip" id="Tooltip" role="tooltip"><span class="nextMatch"><span class="badge-20 {{ opponentLogo }}"></span> </span><a href="{{ url }}" class="tooltipContainer linkable tooltip-link tooltip-right" role="tooltip"><span class="tooltip-content"><div href="#!" class="matchAbridged"><span class="matchInfo">{{ matchDate }}</span> <span class="teamName">{{ teams.0.team.club.abbr }}</span> <span class="badge-20 {{ teams.0.team.altIds.opta }}"></span> <time>{{ matchTime }}</time> <span class="badge-20 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName">{{ teams.1.team.club.abbr }}</span> <span class="icn arrow-right"></span></div></span></a></span>{{/nextMatch}}</td>{{/hasNextMatches}}</tr><tr class="expandable" data-filtered-table-row-expander="{{team.id}}"><td colspan="13"><a href="{{ link }}" class="expandableTeam"><span class="badge-50 {{team.altIds.opta}}"></span> <span class="teamName">{{team.name}}</span></a><div class="expandableFixtures">{{#lastResult}}<div class="resultWidget"><div class="label"><strong>{{ latestResultLabel }}</strong> - {{ matchDate }}</div><a href="{{ url }}" class="matchAbridged pre"><span class="teamName">{{ teams.0.team.club.abbr }}</span> <span class="badge-20 {{ teams.0.team.altIds.opta }}"></span> <span class="score">{{ teams.0.score }}<span>-</span>{{ teams.1.score }} </span><span class="badge-20 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName">{{ teams.1.team.club.abbr }}</span> <span class="icn arrow-right"></span></a></div>{{/lastResult}} {{#nextMatch}}<div class="resultWidget"><div class="label"><strong>{{ latestFixtureLabel }}</strong> - {{ matchDate }}</div><a href="{{ url }}" class="matchAbridged pre"><span class="teamName">{{ teams.0.team.club.abbr }}</span> <span class="badge-20 {{ teams.0.team.altIds.opta }}"></span> <time>{{ matchTime }}</time> <span class="badge-20 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName">{{ teams.1.team.club.abbr }}</span> <span class="icn arrow-right"></span></a></div>{{/nextMatch}}<div class="btnContainer"><a href="{{ link }}" class="btn-highlight" role="btn">Visit Club Page<span class="icn arrow-right-w"></span></a></div></div><div class="teamPerformanceStandingsArea" style="display:none"><header><h3 class="subHeader left">{{performanceChartLabel}}</h3><a href="/stats/comparison" class="btn right">Compare against another team<span class="icn arrow-right"></span></a></header><div class="teamPerformanceStandingsContainer"></div></div></td></tr>{{/rows}}</tbody></table>{{#pointsDeducted}}<p class="pointsDeductedContainer">{{ message }}</p>{{/pointsDeducted}}</div></div></div>',PULSE.app.templates.knockoutmatch='<div class="tableFixtureContainer"><div class="tableFixtureDateHeader"><strong>{{ date }}</strong></div>{{#matches}} {{#isFixture}}<div class="fixture preMatch tableFixtureResultContainer"><span class="overview"><span class="teams"><span class="team"><span class="teamName">{{ homeName }}</span> <span alt="" class="badge-25 {{ teams.0.team.altIds.opta }}"></span> </span><time>{{ matchTime }}</time> <span class="team"><span alt="" class="badge-25 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName">{{ awayName }}</span> </span></span><span class="stadiumName"><span class="icn stadium"></span>{{ groundText }}</span></span></div>{{/isFixture}} {{#isResult}}<div class="fixture preMatch tableFixtureResultContainer"><span class="overview"><span class="teams"><span class="team"><span class="teamName">{{ homeName }}</span> <span alt="" class="badge-25 {{ teams.0.team.altIds.opta }}"></span> </span><span class="score">{{ teams.0.score }}<span>-</span>{{ teams.1.score }} </span><span class="team"><span alt="" class="badge-25 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName">{{ awayName }}</span> </span></span><span class="stadiumName"><span class="icn stadium"></span>{{ groundText }}</span></span></div>{{/isResult}} {{/matches}}</div>',PULSE.app.templates.nostandings='<div class="wrapper col-12"><div class="tableContainer" data-round="{{ roundId }}"><div class="noContentContainer">{{ label }}</div></div></div>',PULSE.app.templates.progressmatch='<div class="performanceResult"><div class="matchAbridged pre"><span class="matchInfo">{{ matchDate }}</span> <strong class="position">{{ posLabel }}: {{ position }}</strong><div class="teamContainer"><span class="teamName"><span class="long">{{ teams.0.team.club.name }}</span> <span class="short">{{ teams.0.team.club.abbr }}</span> </span><span class="badge-20 {{ teams.0.team.altIds.opta }}"></span> <span class="score">{{ teams.0.score }}<span>-</span>{{ teams.1.score }} </span><span class="badge-20 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName"><span class="long">{{ teams.1.team.club.name }}</span> <span class="short">{{ teams.1.team.club.abbr }}</span></span></div></div></div>',PULSE.app.templates.tablecompexplained='<section class="notificationPromo tableNotificationPromo"><a class="notificationLink" href="{{ url }}"><h4 class="notificationTitle">{{ promoLabel }}</h4><div class="icn arrow-right-d tableNonHoverContainer"></div><div class="icn arrow-right-w tableHoverContainer"></div></a></section>',PULSE.app.templates.tablerounds='{{#structure}}<div data-current="{{ current }}" data-season-id="{{ roundCompSeason }}" data-ui-tab="{{ tabLabel }}" class="roundContainer" data-type="{{ type }}" data-id="{{ id }}" data-range="{{ rangeString }}"></div>{{/structure}}',PULSE.app.templates.tablerowexpanded='<td colspan="13"></td>';
/*globals PULSE, PULSE.app, PULSE.I18N, PULSE.ui */

( function( app, ui, i18n, core, common ) {

	/**
	 * @namespace app.clubContentList.private
	 */

	/**
	 * Get container class based on class
	 * @param {element} container Container for list
	 * @param {string} type Type of content ( text, video, photo, playlist )
	 */

	var getContainerClass = function( container, type )
	{
		if ( type === 'video' )
		{
			var lis = container.getElementsByTagName( 'li' );

			var addClass = 4;
			var removeClasses = [ 4, 3, 2 ];
			for ( var i = 0; i < removeClasses.length; i++ )
			{
				if ( lis.length % removeClasses[ i ] === 0 )
				{
					addClass = removeClasses[ i ];
					removeClasses.splice( i, 1 );
					break;
				}
			}
			if ( removeClasses.length === 3 )
			{
				removeClasses.splice( 0, 1 );
			}

			container.classList.add( "block-list-" + addClass );
			removeClasses.map( function( removeClass )
			{
				container.classList.remove( "block-list-" + removeClass );
			} );
		}
	}

	/**
	 * List content which lists content
	 * @param {[object]} data List of contnet
	 * @param {string} type Type of content ( text, video, photo, playlist )
	 */
	var getModelArray = function( data, type )
	{
		var models = [];

		data.map( function( content )
		{
			models.push( common.getContentModel( content ) );
		} );

		return models;
	}

	/**
	 * List data for content
	 * @param {object} element element in which to display player index
	 * @param {config} config configuration object for the index
	 */
	app.clubContentList = function( element, config ) {
		var _self = this;

		_self.element = element;

		_self.requestConfig = {};
		_self.type = _self.element.getAttribute( 'data-content-type' );
		_self.template = _self.type;
		if( _self.type == "text" ){
			_self.template += "horizontal";
		}
		_self.requestConfig.pageSize = _self.element.getAttribute( 'data-page-size' );
		_self.requestConfig.page = _self.element.getAttribute( 'data-page' );
		_self.requestConfig.tagNames = _self.element.getAttribute( 'data-tags' );
		_self.requestConfig.references = 'FOOTBALL_CLUB:' + (app.local && app.local.clubId ? app.local.clubId : "");
		_self.headerContent = _self.element.getElementsByTagName( "header" );
		_self.contentListContainer = _self.element.getElementsByClassName( "contentListContainer" );

		if ( _self.type === 'video' && _self.contentListContainer && _self.contentListContainer.length > 0 )
		{
			_self.videoList = new common.videoList( _self.contentListContainer[ 0 ] );
		}

		_self.initData();

	};

	/**
	 * Start data feed based on config
	 * @param {object} config Configuration for matches
	 */
	app.clubContentList.prototype.initData = function( config )
	{
		var _self = this;

		var subscriberObject = {
			url : app.common.createContentPath( _self.type, _self.requestConfig ),
			method: "GET",
			callback: _self.renderContent,
			forceCallback: true,
			constant: true,
			target: this
		};

		this.startData( subscriberObject );
	}

	/**
	 * start the data manager and fetch data
	 */
	app.clubContentList.prototype.startData = function( config )
	{
		core.data.manager.add( config );
	};

	/**
	 * Render content for list
	 * @param {Object} data Render data
	 */
	app.clubContentList.prototype.renderContent = function( data )
	{
		var _self = this;
		if ( data && data.content && _self.contentListContainer && _self.contentListContainer.length > 0 )
		{
			var content = getModelArray( data.content, _self.type );

			var blockClass = "block-list-4";

			if( content.length % 4 === 0 ) {
				blockClass = "block-list-4";
			}
			else if( content.length % 3 === 0 ) {
				blockClass = "block-list-3";
			}
			else if( content.length % 2 === 0 ) {
				blockClass = "block-list-2";
			}

			core.style.addClass( _self.contentListContainer[ 0 ], blockClass );
			
			if( data.content.length > 0 ){
				core.style.removeClass( _self.headerContent[ 0 ], "visuallyHidden" );
			}

			var html = '';

			content.forEach( function( singleContent, index )
			{
				html += Mustache.render( app.templates[ _self.template ], singleContent );
			});

			if ( data.pageInfo && data.pageInfo.page > 0 )
			{
				_self.contentListContainer[ 0 ].innerHTML += html;
			}
			else
			{
				_self.contentListContainer[ 0 ].innerHTML = html ;
			}

			getContainerClass( _self.contentListContainer[ 0 ], _self.type );

			if ( _self.videoList )
			{
				_self.videoList.initModal();
			}
		}
	};

	var w = document.querySelectorAll( '[data-widget="club-content-list"]' );
	w = Array.prototype.map.call( w, function( widget ) {
		return new  app.clubContentList( widget, {} );
	} );


} )( PULSE.app, PULSE.ui, PULSE.I18N, PULSE.core, PULSE.app.common );

/*globals PULSE, PULSE.app, PULSE.I18N, PULSE.ui */

( function( app, ui, i18n, core, common ) {

	/**
	 * @namespace app.filteredContentList.private
	 */

	/**
	 * Get container class based on class
	 * @param {element} container Container for list
	 * @param {string} type Type of content ( text, video, photo, playlist )
	 */

	var getContainerClass = function( container, type )
	{
		if ( type === 'video' || type === 'playlist' )
		{
			var lis = container.getElementsByTagName( 'li' );

			var addClass = 4;
			var removeClasses = [ 4, 3, 2 ];
			for ( var i = 0; i < removeClasses.length; i++ )
			{
				if ( lis.length % removeClasses[ i ] === 0 )
				{
					addClass = removeClasses[ i ];
					removeClasses.splice( i, 1 );
					break;
				}
			}
			if ( removeClasses.length === 3 )
			{
				removeClasses.splice( 0, 1 );
			}

			container.classList.add( "block-list-" + addClass );
			removeClasses.map( function( removeClass )
			{
				container.classList.remove( "block-list-" + removeClass );
			} );
		}
	}

	/**
	 * List content which lists content
	 * @param {[object]} data List of contnet
	 * @param {string} type Type of content ( text, video, photo, playlist )
	 */
	var getModelArray = function( data, type )
	{
		var models = [];

		data.map( function( content )
		{
			models.push( common.getContentModel( content ) );
		} );

		return models;
	}

	/**
	 * List data for content
	 * @param {object} element element in which to display player index
	 * @param {config} config configuration object for the index
	 */
	app.filteredContentList = function( element, config ) {
		var _self = this;

		_self.element = element;
		_self.filterControllerElement = _self.element.querySelector( 'section.pageFilter' );

		_self.requestConfig = {};
		_self.type = _self.element.getAttribute( 'data-content-type' );
		_self.requestConfig.sort = _self.element.getAttribute( 'data-search-sort' );
		_self.requestConfig.pageSize = _self.element.getAttribute( 'data-page-size' );
		_self.requestConfig.page = _self.element.getAttribute( 'data-page' );
		_self.requestConfig.tagNames = _self.element.getAttribute( 'data-tags' );
		_self.requestConfig.references = _self.element.getAttribute( 'data-references' );
		_self.requestConfig.playlistTypeRestriction = _self.element.getAttribute( 'data-playlist-restriction' );
		_self.requestConfig.fullObjectResponse = "true";

		_self.originalReferences = _self.requestConfig.references ? _self.requestConfig.references.split( ',' ) : [];

		_self.contentListContainer = _self.element.getElementsByClassName( "contentListContainer" )

		if ( _self.filterControllerElement )
		{
			_self.filterController = new app.common.listFilterController( _self.filterControllerElement , {
				dropdowns: app.filterGroups[ _self.filterControllerElement.getAttribute( 'data-filter-config' ) ],
				delegate : _self
			} );

			var states = _self.filterController.getState();

			var allMinus = true
			states.map( function( state )
			{
				if ( state.id != -1 )
				{
					allMinus = false;
				}
			} );

			if ( !allMinus )
			{
				_self.filterUpdated( states, true );
			}
		}

		_self.searchContentContainer = _self.element.getElementsByClassName( 'searchContentContainer' );
		if ( _self.searchContentContainer && _self.searchContentContainer.length > 0 )
		{
			var searchPlaceholder = _self.searchContentContainer[ 0 ].getAttribute( 'data-placeholder' );
			var placeholder = ( searchPlaceholder ) ? searchPlaceholder : i18n.lookup( 'label.search' );
			_self.search = new common.search( _self.searchContentContainer[ 0 ], {
				callback : _self.searchTerm,
				target : _self,
				updateUrl : true,
				placeholder : placeholder
			} );
			_self.search.checkParam();
		}

		if ( _self.type === 'video' && _self.contentListContainer && _self.contentListContainer.length > 0 )
		{
			_self.videoList = new common.videoList( _self.contentListContainer[ 0 ] );
		}

		_self.loader = new app.common.scrollLoader( _self.element, _self, true );
	};

	core.object.extend( app.filteredContentList.prototype, app.common.scrollLoaderDelegate.prototype );

	/**
	 * delegate method of the scroll loader, called when a load of a new page
	 * is needed according to the loader
	 */
	app.filteredContentList.prototype.didRequestLoad = function() {
		var _self = this;

		_self.requestConfig.page++;
		if ( _self.term && _self.term.length > 0 )
		{
			_self.searchTerm( _self.term );
		}
		else
		{
			_self.initData( _self.urlConfig );
		}
	};

	/**
	 * Get data for a search term and page size
	 * @param {String} term Search term
	 * @param {int} page Page for search term
	 */
	app.filteredContentList.prototype.searchTerm = function( term, page )
	{
		var _self = this;

		_self.term = term;

		if ( page != undefined )
		{
			_self.requestConfig.page = page;
		}

		if ( _self.loader )
		{
			_self.loader.newLoader();
		}
		if ( _self.term.length > 0 )
		{
			var searchType = _self.type;

			var params = _self.search ? _self.search.getSearchParams( _self.requestConfig ) : {};
			var subscriberObject = {
				url: app.common.createSearchPath( [ term, term + "*" ], [ searchType ], params ),
				method: "GET",
				callback: _self.contentSearch,
				target: _self
			};

			_self.startData( subscriberObject );

			if ( _self.filterController )
			{
				_self.filterController.hide();
			}
		}
		else
		{
			if ( _self.filterController )
			{
				_self.filterController.resetAll();
				_self.filterController.show();
			}
			else
			{
				_self.initData();
			}
		}
	}

	/**
	 * Search data
	 * @param {Object} data Search data
	 */
	app.filteredContentList.prototype.contentSearch = function( data )
	{
		var _self = this;

		if ( data && data.hits )
		{
			var evaluatedContent = _self.search.evaluateHits( data.hits );
			_self.renderContent( { content : evaluatedContent, pageInfo : _self.requestConfig } );
		}
	}

	/**
	 * Method when the filters are updated, find compSeason, club and person
	 * @param {object} config Configuration for matches
	 * @param {Boolean} init Flag to indicate that the filter is initialised
	 */
	app.filteredContentList.prototype.filterUpdated = function( states, init )
	{
		var _self = this;

		var references = [];
		var original = _self.requestConfig.references.split( ',' );

		if ( original[ 0 ] === '' )
		{
			original = [];
		}

		_self.originalReferences.map( function( ref )
		{
			references.push( ref );
		} );
		states.map( function( state )
		{
			var id = state.state.id;
			if ( id != -1 )
			{
				switch( state.name )
				{
					case 'FOOTBALL_COMPETITION':
					case 'FOOTBALL_COMPSEASON':
					case 'FOOTBALL_CLUB':
					case 'FOOTBALL_PERSON':
						references.push( state.name + ':' + id );
						break;
				}
			}
		} );

		var isSame = ( references.length == original.length ) && references.every( function(element, index) {
		    return element === original[index];
		});

		if ( !isSame )
		{
			_self.requestConfig.references = references.join( ',' );
			_self.filterUpdate( states );
		}
	}

	/**
	 * Method when the filters are cleared.
	 * @param {object} states States of the filters
	 */
	app.filteredContentList.prototype.filterCleared = function( states )
	{
		var _self = this;

		_self.requestConfig.references = _self.originalReferences.join( ',' );
		_self.filterUpdate( states );
	}

	/**
	 * Method to update content after filter.
	 * @param {object} states States of the filters
	 */
	app.filteredContentList.prototype.filterUpdate = function( states )
	{
		var _self = this;

		_self.requestConfig.page = 0;
		if ( _self.loader )
		{
			_self.loader.newLoader();
		}
		_self.initData( _self.requestConfig );
	}

	/**
	 * Check related articles have any tags by getting full object
	 * @param {HTMLElement} container Container for chekcing articles
	 */
	app.filteredContentList.prototype.checkForRelatedArticles = function( container )
	{
		var _self = this;
		var related = container.getElementsByClassName( 'relatedArticleContainer' );
		if ( related )
		{
			for ( var i = related.length - 1; i > -1; i-- )
			{
				var relatedId = related[ i ].getAttribute( 'data-id' );
				var type = related[ i ].getAttribute( 'data-type' );
				_self.getRelatedContent( type, relatedId, related[ i ] );
				core.style.removeClass( related[ i ], 'relatedArticleContainer' );
			}
		}
	}

	/**
	 * Start data feed based on config
	 * @param {string} type Type of related item
	 * @param {int} relatredId Id of content
	 * @param {HTMLElement} container Container for related content
	 */
	app.filteredContentList.prototype.getRelatedContent = function( type, relatedId, container )
	{
		var _self = this;

		var subscriberObject = {
			url : app.common.createContentPath( type, {}, undefined, relatedId ),
			method: "GET",
			callback: _self.renderRelated,
			target: this,
			container : container
		};

		this.startData( subscriberObject );
	}

	/**
	 * Render related articles
	 * @param {HTMLElement} container Container for chekcing articles
	 */
	app.filteredContentList.prototype.renderRelated = function( data, config )
	{
		var _self = this;

		if ( data && config.container )
		{
			var related = common.getContentModel( data );
			config.container.innerHTML = Mustache.render( app.templates[ 'relatedcontent' ], related );
		}
	}

	/**
	 * Start data feed based on config
	 * @param {object} config Configuration for matches
	 */
	app.filteredContentList.prototype.initData = function( config )
	{
		var _self = this;

		var subscriberObject = {
			url : app.common.createContentPath( _self.type, _self.requestConfig ),
			method: "GET",
			callback: _self.renderContent,
			target: this
		};

		this.startData( subscriberObject );
	}

	/**
	 * start the data manager and fetch data
	 */
	app.filteredContentList.prototype.startData = function( config )
	{
		core.data.manager.add( config );
	};

	/**
	 * Render content for list
	 * @param {Object} data Render data
	 */
	app.filteredContentList.prototype.renderContent = function( data )
	{
		var _self = this;
		if ( data && data.content && _self.contentListContainer && _self.contentListContainer.length > 0 )
		{
			var content = getModelArray( data.content, _self.type );

			_self.loader.contentLoaded();

			if ( content.length < 1 )
			{
				_self.loader.removeLoader();
			}

			var html = '';

			content.forEach( function( singleContent, index )
			{
				html += Mustache.render( app.templates[ _self.type ], singleContent );
			});

			if ( content.length < 1 && data.pageInfo.page < 1 && ( _self.type === 'video' || _self.type === 'text' ) )
			{
				html = Mustache.render( app.templates[ 'nocontentlist' ], { label : i18n.lookup( 'label.nocontent' + _self.type ) } );
			}

			if ( data.pageInfo && data.pageInfo.page > 0 )
			{
				_self.contentListContainer[ 0 ].innerHTML += html;
			}
			else
			{
				_self.contentListContainer[ 0 ].innerHTML = html ;
			}

			if ( _self.type === 'text' )
			{
				_self.checkForRelatedArticles( _self.contentListContainer[ 0 ] );
			}

			getContainerClass( _self.contentListContainer[ 0 ], _self.type );

			if ( _self.videoList )
			{
				_self.videoList.initModal();
			}
		}
	};

	var init = function(){
		var w = document.querySelectorAll( '[data-widget="filtered-content-list"]' );
		w = Array.prototype.map.call( w, function( widget ) {
			return new  app.filteredContentList( widget, {} );
		} );
	};

	app.filterGroups.setData( init );

} )( PULSE.app, PULSE.ui, PULSE.I18N, PULSE.core, PULSE.app.common );

/*globals PULSE, PULSE.core */

( function( app, core, common, i18n ) {
	"use strict";

	/**
	 * @namespace app.listDataClientSideSearch.private
	 */

	/**
	 * List data which lists data for players or teams
	 * @param {[object]} data List of data
	 * @param {string} type Type of data ( team or player )
	 */

	var getModelArray = function( data, type )
	{
		var models = [];

		data.map( function( content )
		{
			var model = content || {};
			switch( type )
			{
				case 'team':
					var id = ( model.club && model.club.id ) ? model.club.id : model.id;
					model.url = common.generateContentUrl( type, id, model.club.name.replace(new RegExp(' ', 'g'), '-') );
					model.optaId = ( model.altIds && model.altIds.opta ) ? model.altIds.opta : undefined;
					model.displayName = model.name || model.club.name;
					model.clubAbbr = model.club.abbr;
					model.stadiumName = model.grounds[0].name;
					model.labelClubHome = i18n.lookup( 'label.clubprofile');
					break;
				case 'manager':
					model.url = common.generateContentUrl( type, model.id, model.name.display );
					model.clubUrl = common.generateContentUrl( 'club', model.currentTeam.id, model.currentTeam.club.name.replace(new RegExp(' ', 'g'), '-') );
					model.clubName = model.currentTeam.club.name ;
					model.clubShortName = model.currentTeam.club.shortName ;
					model.clubAbbr = model.currentTeam.club.abbr ;
					model.optaId = model.currentTeam.altIds.opta;
					model.displayName = model.name.display;
					model.activeText = ( model.active ) ? 'Active' : "Non Active";
					model.nationalName = ( model.birth && model.birth.country && model.birth.country.country ) ? model.birth.country.country : '';
					model.nationalCode = ( model.birth && model.birth.country && model.birth.country.isoCode) ? model.birth.country.isoCode : '';
					break;
				case 'referee':
					model.displayName = model.name.display;
					model.url = common.generateContentUrl( type, model.id, model.displayName );
					break;
			}
			models.push( model );
		} );

		return models;
	};

	/**
	 * List data which lists data for players or teams
	 * @param {object} element element in which to display player index
	 * @param {config} config configuration object for the index
	 */
	app.listDataClientSideSearch = function( element, config ) {

		var _self = this;

		_self.element = element;

		_self.dataContainer = _self.element.getElementsByClassName( 'dataContainer' );
		_self.searchDataContainer = _self.element.getElementsByClassName( 'searchResultDataContainer' );
		_self.allTimeDataContainer = _self.element.getElementsByClassName( 'allTimeDataContainer' );

		_self.type = _self.element.getAttribute('data-type');

		_self.requestConfig = {};
		_self.requestConfig.pageSize = _self.element.getAttribute('data-page-size');
		_self.requestConfig.compSeasons = parseInt( _self.element.getAttribute('data-comp-seasons') );
		_self.requestConfig.compCodeForActivePlayer = _self.element.getAttribute('data-active-comp');

		_self.indexSection = _self.element.getElementsByClassName( 'indexSection' );
		_self.searchIndexSection = _self.element.getElementsByClassName( 'searchIndexSection' );
		_self.indexAllTimeSection = _self.element.getElementsByClassName( 'indexAllTime' );
		_self.requestConfig.comps = app.competition.FIRST;
		_self.requestConfig.altIds = true;

		switch( _self.type  )
		{
			case 'team':
				_self.path = "teams.all";
				_self.template = "teamCard";
				_self.listTemplate = "teamList";
				_self.allDataRequestParams = {
					pageSize: 100,
					comps: app.competition.FIRST,
					altIds: true,
					page:0
				}
				break;
			case 'manager':
				_self.path = "team-officials.all";
				_self.template = "manager";
				_self.listTemplate = "manager";
				_self.requestConfig.type = "manager";
				_self.allDataRequestParams = {
					pageSize: 500,
					comps: app.competition.FIRST,
					altIds: true,
					type:"manager",
					compCodeForActivePlayer:'EN_PR',
					page:0
				}
				break;
			case 'referee':
				_self.getRefereeTabs();
				_self.path = "match-officials.all";
				_self.template = "referee";
				_self.listTemplate = "referee";
				_self.requestConfig.type = "M";
				_self.requestConfig.comps = undefined;
				_self.allDataRequestParams = {
					pageSize: 500,
					comps: app.competition.FIRST,
					altIds: true,
					type:"M",
					page:0
				}
				break;
		}

		_self.requestConfig.page = 0;
		_self.searchIndexSection[ 0 ].style.display = 'none';
		_self.getAllData();

		_self.filterControllerElement = _self.element.querySelector( 'section.pageFilter' );
		if ( _self.filterControllerElement )
		{
			_self.filterController = new app.common.listFilterController( _self.filterControllerElement , {
				dropdowns: app.filterGroups[ _self.filterControllerElement.getAttribute('data-filter-config') ],
				delegate : _self
			} );
		}

		_self.searchPlayerContainer = _self.element.getElementsByClassName( 'searchDataContainer' );
		if ( _self.searchPlayerContainer && _self.searchPlayerContainer.length > 0 )
		{
			var searchPlaceholder = _self.searchPlayerContainer[ 0 ].getAttribute( 'data-placeholder' );
			var placeholder = ( searchPlaceholder ) ? searchPlaceholder : i18n.lookup( 'label.search' );
			_self.search = new common.search( _self.searchPlayerContainer[ 0 ], {
				callback : _self.searchTerm,
				target : _self,
				updateUrl : true,
				placeholder : placeholder
			} );
		}

		//_self.term = '';

		//_self.loader = new app.common.scrollLoader( _self.element, _self, true );

	};

	var setPageLoading = function( _self, container ) {
		_self.loaderMarkup  = _self.loaderMarkup || Mustache.render( app.templates.scrollloader, { load : i18n.lookup( 'label.loadingmore' ) } );
		container.innerHTML = _self.loaderMarkup;
	};


	app.listDataClientSideSearch.prototype.getRefereeTabs = function()
	{
		var _self = this;

		_self.refereeTabsContainer = _self.element.getElementsByClassName( 'refereeTabsContainer' );

		var refTabs = document.querySelectorAll( '[data-widget="referee-tabs"]' );
		if ( refTabs && refTabs.length > 0 && _self.refereeTabsContainer && _self.refereeTabsContainer.length > 0 )
		{
			Array.prototype.forEach.call( refTabs, function( vidiPrinter ) {
				_self.refereeTabsContainer[ 0 ].appendChild( vidiPrinter );
			});
		}
	}

	/**
	 * Get data for a search term and page size
	 * @param {String} term Search term
	 * @param {int} page Page for search term
	 */
	app.listDataClientSideSearch.prototype.searchTerm = function( term, page )
	{
		var _self = this;

		_self.term = term;

		if ( _self.allData !== undefined && _self.term.length > 0 )
		{
			_self.getAllData('search', term);
		}
		else
		{
			_self.showSearchData(false);
			_self.filterController.resetAll();
			_self.filterController.show();
		}

	};


	/**
	 * Initialise data
	 */
	app.listDataClientSideSearch.prototype.initData = function()
	{
		var _self = this;
		var subscriberObject = {
			url: app.common.createApiPath( _self.path, _self.requestConfig ),
			method: "GET",
			callback: _self.renderData,
			headers: [ app.accountHeader ],
			target: this,
			forceCallback : true
		};

		this.startData( subscriberObject );
	};

	/**
	 * start the data manager and fetch data
	 */
	app.listDataClientSideSearch.prototype.startData = function( config )
	{
		core.data.manager.add( config );
	};

	/**
	 * delegate method of the scroll loader, called when a load of a new page
	 * is needed according to the loader
	 */
	app.listDataClientSideSearch.prototype.didRequestLoad = function()
	{
		var _self = this;
	};

	/**
	 * Method when the filters are cleared.
	 * @param {object} states States of the filters
	 */
	app.listDataClientSideSearch.prototype.filterCleared = function( states )
	{
		var _self = this;

		_self.filterUpdated( states );
	};

	/**
	 * When filters are updated, find compseason and load new page if it is different from the original
	 * @param {Object} states Filter dropdown states
	 * @param {Boolean} init Flag to indicate that the filter is initialised
	 * @param {Boolean} force Boolean to force new load
	 */
	app.listDataClientSideSearch.prototype.filterUpdated = function( states, init, force )
	{
		var _self = this;

		var references = [];

		var compSeasonState;
		var teamId;

		for( var i = 0; i < states.length; i++ ) {
			if( states[ i ].name === 'compSeasons' ) {
				compSeasonState = states[ i ];
			}
			else if( states[ i ].name === 'teams' ){
				teamId = states[ i ].state.id;
			}
		}

		if( init && ( compSeasonState.state.id === _self.requestConfig.compSeasons ) ) {
			return;
		}

		var compSeasonsSelectedValue = _self.requestConfig.compSeasons;
		if( compSeasonState !== undefined ) {

			setPageLoading( _self, _self.dataContainer[0] );
			_self.requestConfig.page = 0;

			_self.requestConfig.compSeasons = compSeasonState.state.id;
			if ( teamId && teamId > -1 ) {
				_self.requestConfig.teams = teamId;
			}
			else {
				_self.requestConfig.teams = undefined;
			}

			_self.initData();

		}
	};

	/**
	 * Search data
	 * @param {Object} data Search data
	 */
	app.listDataClientSideSearch.prototype.dataSearch = function( data )
	{
		var _self = this;

		if ( data && data.hits )
		{
			var evaluatedPlayers = _self.search.evaluateHits( data.hits );
			_self.renderData( { content : evaluatedPlayers, pageInfo : _self.requestConfig } );
		}
	};

	/**
	 * Gets all team data for all time, this data get cached
	 */
	app.listDataClientSideSearch.prototype.getAllData = function(listType, term )
	{
		var _self = this;

		if(_self.allData === undefined) {

			var subscriberObject = {
				url: app.common.createApiPath( _self.path , _self.allDataRequestParams),
				method: "GET",
				callback: function functionName(data) {

					_self.allData = getModelArray( data.content, _self.type );

					_self.renderListData(listType, term);

				},
				headers: [ app.accountHeader ],
				target: this
			};
			_self.startData( subscriberObject );
		}
		else {
			_self.renderListData(listType, term);
		}

	};

	/**
	 * When filters are updated, find compseason and load new page if it is different from the original
	 * @param {Object} data to render
	 * @param {Boolean} list type
	 * @param {Boolean} serach filter term
	 */
	app.listDataClientSideSearch.prototype.renderListData = function(listType, term )
	{
		var _self = this;

		var html = '';
		if(listType == "search") {
			var amount = 0;
			_self.allData.forEach( function( singleContent )
			{
				if (singleContent.displayName.toLowerCase().indexOf(term.toLowerCase()) !=-1) {
					if ( !singleContent.active )
					{
						singleContent.noDisplayClub = true;
					}
					html += Mustache.render( app.templates[ _self.listTemplate ], singleContent );
					singleContent.noDisplayClub = false;
					amount++;
				}
			});
			if ( amount < 1 )
			{
				html = Mustache.render( app.templates[ 'nodatalist' ], { label : i18n.lookup( 'label.nocontent' + _self.type ) } );
			}
			_self.searchDataContainer[ 0 ].innerHTML = html ;
			_self.showSearchData(true);
		}
		else {
			if(_self.type === 'team') {
				_self.showSearchData(false);
				_self.allData.forEach( function( singleContent )
				{
					html += Mustache.render( app.templates[ _self.listTemplate ], singleContent );
				});
				_self.allTimeDataContainer[ 0 ].innerHTML = html ;

			}
		}
	};

	/**
	 * Render data for list
	 * @param {Object} data Render data
	 */
	app.listDataClientSideSearch.prototype.renderData = function( data )
	{
		var _self = this;

		if ( data && data.content )
		{
			var dataModels = getModelArray( data.content, _self.type );

			var html = '';

			if ( _self.type === 'manager' )
			{
				dataModels.sort( function( a, b )
				{
					if ( a.currentTeam && b.currentTeam )
					{
						if ( a.currentTeam.name > b.currentTeam.name )
						{
							return 1;
						}
						else
						{
							return -1;
						}
					}
				} );
			}

			dataModels.forEach( function( singleContent )
			{
				html += Mustache.render( app.templates[ _self.template ], singleContent );
			});

			if ( data.content.length < 1 )
			{
				html = Mustache.render( app.templates[ 'nodatalist' ], { label : i18n.lookup( 'label.nocontent' + _self.type ) } );
			}

			if ( data.pageInfo && data.pageInfo.page > 0 )
			{
				_self.dataContainer[ 0 ].innerHTML += html;
			}
			else
			{
				_self.dataContainer[ 0 ].innerHTML = html ;
			}
			_self.showSearchData(false);
		}
	};

	/**
	 * Display/Hide Team Search/Team Card element, toggle between these two elements
	 * @param {Boolean} Display Team Search
	 */
	app.listDataClientSideSearch.prototype.showSearchData = function( displaySearchTeamData )
	{
		var _self = this;

		if(displaySearchTeamData){
			_self.searchIndexSection[ 0 ].style.display = '';
			_self.indexSection[ 0 ].style.display = 'none';
		}
		else {
			_self.searchIndexSection[ 0 ].style.display = 'none';
			_self.indexSection[ 0 ].style.display = '';
		}

	};

	var init = function(){
		// initialise on results lists
		var w = document.querySelectorAll( '[data-widget="list-data-client-side-search"]' );
		w = Array.prototype.map.call( w, function( widget ){
			return new app.listDataClientSideSearch( widget, {} );
		} );
	};

	app.filterGroups.setData( init );

} )( PULSE.app, PULSE.core, PULSE.app.common, PULSE.I18N );

/*globals PULSE, PULSE.core */

( function( app, core, common, i18n ) {
	"use strict";

	/**
	 * @namespace app.listDataTeam.private
	 */

	/**
	 * List data which lists data for players or teams
	 * @param {[object]} data List of data
	 * @param {string} type Type of data ( team or player )
	 */

	var getModelArray = function( data, type )
	{
		var models = [];

		data.map( function( content )
		{
			var model = content || {};
			var id = ( model.club && model.club.id ) ? model.club.id : model.id;
			model.url = common.generateContentUrl( type, id, model.club.name.replace(new RegExp(' ', 'g'), '-') );
			model.optaId = ( model.altIds && model.altIds.opta ) ? model.altIds.opta : undefined;
			model.displayName = model.name || model.club.name;
			model.clubAbbr = model.club.abbr;
			model.stadiumName = model.grounds[0].name;
			model.stadiumName = model.grounds[0].name;
			model.labelClubHome = i18n.lookup( 'label.clubprofile');


			models.push( model );
		} );

		return models;
	};

	/**
	 * List data which lists data for players or teams
	 * @param {object} element element in which to display player index
	 * @param {config} config configuration object for the index
	 */
	app.listDataTeam = function( element, config ) {

		var _self = this;

		_self.element = element;

		_self.teamCardContainer = _self.element.getElementsByClassName( 'indexSection' );
		_self.searchTeamDataContainer = _self.element.getElementsByClassName( 'searchTeamDataContainer' );
		_self.allTimeDataContainer = _self.element.getElementsByClassName( 'allTimeDataContainer' );

		_self.type = _self.element.getAttribute('data-type');

		_self.requestConfig = {};
		_self.requestConfig.pageSize = _self.element.getAttribute('data-page-size');
		_self.requestConfig.compSeasons = _self.element.getAttribute('data-comp-seasons');

		_self.teamCardDataElement = _self.element.getElementsByClassName( 'teamCardData' );
		_self.searchTeamDataElement = _self.element.getElementsByClassName( 'searchTeamData' );
		_self.requestConfig.comps = app.competition.FIRST;
		_self.requestConfig.altIds = true;
		_self.path = "teams.all";
		_self.template = "teamCard";
		_self.listTemplate = "teamList";
		_self.showSearchTeamData(false);
		_self.getAllTeamData();

		_self.requestConfig.page = 0;

		_self.filterControllerElement = _self.element.querySelector( 'section.pageFilter' );
		if ( _self.filterControllerElement )
		{
			_self.filterController = new app.common.listFilterController( _self.filterControllerElement , {
				dropdowns: app.filterGroups[ _self.filterControllerElement.getAttribute('data-filter-config') ],
				delegate : _self
			} );
		}

		_self.searchPlayerContainer = _self.element.getElementsByClassName( 'searchDataContainer' );
		if ( _self.searchPlayerContainer && _self.searchPlayerContainer.length > 0 )
		{
			var searchPlaceholder = _self.searchPlayerContainer[ 0 ].getAttribute( 'data-placeholder' );
			var placeholder = ( searchPlaceholder ) ? searchPlaceholder : i18n.lookup( 'label.search' );
			_self.search = new common.search( _self.searchPlayerContainer[ 0 ], {
				callback : _self.searchTerm,
				target : _self,
				updateUrl : true,
				placeholder : placeholder
			} );
		}

		_self.term = '';

		_self.loader = new app.common.scrollLoader( _self.element, _self, true );

	};

	var setPageLoading = function( _self, container ) {
		_self.loaderMarkup  = _self.loaderMarkup || Mustache.render( app.templates.scrollloader, { load : i18n.lookup( 'label.loadingmore' ) } );
		container.innerHTML = _self.loaderMarkup;
	};


	/**
	 * Get data for a search term and page size
	 * @param {String} term Search term
	 * @param {int} page Page for search term
	 */
	app.listDataTeam.prototype.searchTerm = function( term, page )
	{
		var _self = this;

		_self.term = term;

		if ( _self.term.length > 0 )
		{
			_self.renderListData(_self.allTeamData, 'search', term);
		}
		else
		{
			_self.showSearchTeamData(false);
			_self.filterController.resetAll();
			_self.filterController.show();
		}

	};


	/**
	 * Initialise data
	 */
	app.listDataTeam.prototype.initData = function()
	{
		var _self = this;
		var subscriberObject = {
			url: app.common.createApiPath( _self.path, _self.requestConfig ),
			method: "GET",
			callback: _self.renderData,
			target: this
		};

		this.startData( subscriberObject );
	};

	/**
	 * start the data manager and fetch data
	 */
	app.listDataTeam.prototype.startData = function( config )
	{
		core.data.manager.add( config );
	};

	/**
	 * delegate method of the scroll loader, called when a load of a new page
	 * is needed according to the loader
	 */
	app.listDataTeam.prototype.didRequestLoad = function()
	{
		var _self = this;

		_self.requestConfig.page++;
		if ( _self.term.length > 0 )
		{
			_self.searchTerm( _self.term );
		}
		else
		{
			_self.initData( _self.urlConfig );
		}
	};

	/**
	 * Method when the filters are cleared.
	 * @param {object} states States of the filters
	 */
	app.listDataTeam.prototype.filterCleared = function( states )
	{
		var _self = this;

		_self.filterUpdated( states );
	};

	/**
	 * When filters are updated, find compseason and load new page if it is different from the original
	 * @param {Object} states Filter dropdown states
	 * @param {Boolean} init Flag to indicate that the filter is initialised
	 * @param {Boolean} force Boolean to force new load
	 */
	app.listDataTeam.prototype.filterUpdated = function( states, init, force )
	{
		var _self = this;
		_self.filterUpdatedForTeam( states, init, force );

	};


	/**
	 * Search data
	 * @param {Object} data Search data
	 */
	app.listDataTeam.prototype.dataSearch = function( data )
	{
		var _self = this;

		if ( data && data.hits )
		{
			var evaluatedPlayers = _self.search.evaluateHits( data.hits );
			_self.renderData( { content : evaluatedPlayers, pageInfo : _self.requestConfig } );
		}
	};

	/**
	 * Gets all team data for all time, this data get cached
	 */
	app.listDataTeam.prototype.getAllTeamData = function()
	{
		var _self = this;

		setPageLoading( _self, _self.allTimeDataContainer[ 0 ] );

		if(_self.allTeamData === undefined) {
			var params = {
				pageSize: 100,
				comps: app.competition.FIRST,
				altIds: true,
				page:0
			};

			var subscriberObject = {
				url: app.common.createApiPath( _self.path , params),
				method: "GET",
				callback: function functionName(data) {

					_self.allTeamData = getModelArray( data.content, _self.type );

					_self.renderListData(_self.allTeamData);

				},
				target: this
			};
			_self.startData( subscriberObject );
		}
		else {
			_self.renderListData(_self.allTeamData);
		}

	};

	/**
	 * When filters are updated, find compseason and load new page if it is different from the original
	 * @param {Object} data to render
	 * @param {Boolean} list type
	 * @param {Boolean} serach filter term
	 */
	app.listDataTeam.prototype.renderListData = function( data, listType, term )
	{
		var _self = this;

		var html = '';
		if(listType == "search") {
			data.forEach( function( singleContent )
			{
				if (singleContent.displayName.toLowerCase().indexOf(term.toLowerCase()) !=-1) {
					html += Mustache.render( app.templates[ _self.listTemplate ], singleContent );
				}
			});
			_self.searchTeamDataContainer[ 0 ].innerHTML = html ;
			_self.showSearchTeamData(true);
		}
		else {
			data.forEach( function( singleContent )
			{
				html += Mustache.render( app.templates[ _self.listTemplate ], singleContent );
			});
			_self.allTimeDataContainer[ 0 ].innerHTML = html ;
			_self.showSearchTeamData(false);
		}
	};

	/**
	 * Render data for list
	 * @param {Object} data Render data
	 */
	app.listDataTeam.prototype.renderData = function( data )
	{
		var _self = this;

		if ( data && data.content )
		{
			var dataModels = getModelArray( data.content, _self.type );

			var html = '';
			var mobileHtml = '';
			_self.teamCardContainer[ 0 ].innerHTML = "";
			dataModels.forEach( function( singleContent )
			{
				html += Mustache.render( app.templates[ _self.template ], singleContent );
			});

			_self.teamCardContainer[ 0 ].innerHTML = html ;
			_self.showSearchTeamData(false);

		}
	};

	/**
	 * Display/Hide Team Search/Team Card element, toggle between these two elements
	 * @param {Boolean} Display Team Search
	 */
	app.listDataTeam.prototype.showSearchTeamData = function( displaySearchTeamData )
	{

		var _self = this;
		if(displaySearchTeamData){
			_self.searchTeamDataElement[ 0 ].style.display = '';
			_self.teamCardDataElement[ 0 ].style.display = 'none';
		}
		else {
			_self.searchTeamDataElement[ 0 ].style.display = 'none';
			_self.teamCardDataElement[ 0 ].style.display = '';
		}

	};

	app.listDataTeam.prototype.filterUpdatedForTeam = function( states, init, force )
	{
		var _self = this;

		var references = [];

		var compSeasonsSelectedValue = _self.requestConfig.compSeasons;


		if ( (_self.requestConfig.compSeasons !==  states[ 0 ].state.id) || force )
		{
			setPageLoading( _self, _self.teamCardContainer[0] );
			_self.requestConfig.page = 0;

			_self.requestConfig.compSeasons = states[ 0 ].state.id;

			_self.initData();
		}
	};

	var init = function(){
		// initialise on results lists
		var w = document.querySelectorAll( '[data-widget="list-data-team"]' );
		w = Array.prototype.map.call( w, function( widget ){
			return new app.listDataTeam( widget, {} );
		} );
	};

	app.filterGroups.setData( init );

} )( PULSE.app, PULSE.core, PULSE.app.common, PULSE.I18N );

/*globals PULSE, PULSE.core */

( function( app, core, common, i18n ) {
	"use strict";

	/**
	 * @namespace app.listData.private
	 */

	/**
	 * List data which lists data for players or teams
	 * @param {[object]} data List of data
	 * @param {string} type Type of data ( team or player )
	 */

	var getModelArray = function( data, type )
	{
		var models = [];

		data.map( function( content )
		{
			var model = content || {};
			switch( type )
			{
				case 'player':
					model.url = common.generateContentUrl( type, model.id, model.name.display.replace(new RegExp(' ', 'g'), '-') );
					model.imageSize = "40x40";
					model.playerImage = common.getDefaultPlayerImg( model.imageSize );
					model.displayName = ( model.name && model.name.display ) ? model.name.display : '';
					model.position = ( model.info && model.info.position ) ? i18n.lookup( 'label.position.' + model.info.position.toLowerCase() ) : '';
					model.nationalName = ( model.nationalTeam && model.nationalTeam.country ) ? model.nationalTeam.country : '';
					model.nationalCode = ( model.nationalTeam && model.nationalTeam.isoCode ) ? model.nationalTeam.isoCode : '';
					model.activeClass = ( model.active ) ? 'activePlayer' : ( model.active != undefined ? 'inactivePlayer' : '' );
					model.activeLabel = ( model.active ) ? i18n.lookup( 'label.active' ) : ( model.active !== undefined ? i18n.lookup( 'label.inactive' ) : '' );
					model.optaId = ( model.altIds && model.altIds.opta ) ? model.altIds.opta : undefined;
					break;
				case 'manager':
						model.url = common.generateContentUrl( type, model.officialId );
						model.clubUrl = common.generateContentUrl( 'club', model.currentTeam.id, model.currentTeam.club.name.replace(new RegExp(' ', 'g'), '-') );
						model.clubName = model.currentTeam.club.name ;
						model.optaId = model.currentTeam.altIds.opta;
						model.displayName = model.name.display;
						model.activeText = ( model.active ) ? 'Active' : "Non Active";
						break;
			}
			models.push( model );
		} );

		return models;
	};

	/**
	 * List data which lists data for players or teams
	 * @param {object} element element in which to display player index
	 * @param {config} config configuration object for the index
	 */
	app.listData = function( element, config ) {

		var _self = this;

		_self.element = element;

		_self.playerContainers = _self.element.getElementsByClassName( 'indexSection' );

		_self.type = _self.element.getAttribute('data-type') || 'player';

		_self.requestConfig = {};
		_self.requestConfig.pageSize = _self.element.getAttribute('data-page-size');
		_self.requestConfig.compSeasons = _self.element.getAttribute('data-comp-seasons');
		_self.requestConfig.altIds = true;
		_self.requestConfig.page = 0;
		_self.requestConfig.type = _self.type;
		_self.initialRender = false;
		_self.staffPath = "teams.single.staff";

		switch ( _self.type )
		{
			case 'player':
				_self.path = "players.all";
				_self.template = "player";
				_self.staffPathLabel = "players";
				break;
			case 'manager':
				_self.path = "team-officials.all";
				_self.template = "manager";
				_self.staffPathLabel = "officials";
				break;
		}

		_self.filterControllerElement = _self.element.querySelector( 'section.pageFilter' );
		if ( _self.filterControllerElement )
		{
			_self.filterController = new app.common.listFilterController( _self.filterControllerElement , {
				dropdowns: app.filterGroups[ _self.filterControllerElement.getAttribute('data-filter-config') ],
				delegate : _self
			} );
		}

		_self.searchPlayerContainer = _self.element.getElementsByClassName( 'searchDataContainer' );
		if ( _self.searchPlayerContainer && _self.searchPlayerContainer.length > 0 )
		{
			var searchPlaceholder = _self.searchPlayerContainer[ 0 ].getAttribute( 'data-placeholder' );
			var placeholder = ( searchPlaceholder ) ? searchPlaceholder : i18n.lookup( 'label.search' );
			_self.search = new common.search( _self.searchPlayerContainer[ 0 ], {
				callback : _self.searchTerm,
				target : _self,
				updateUrl : true,
				placeholder : placeholder
			} );
		}

		_self.term = '';

		_self.loader = new app.common.scrollLoader( _self.element, _self, true );
	};

	var setPageLoading = function( _self, container ) {
		_self.loaderMarkup  = _self.loaderMarkup || Mustache.render( app.templates.scrollloader, { load : i18n.lookup( 'label.loadingmore' ) } );
		container.innerHTML = _self.loaderMarkup;
	};


	/**
	 * Get data for a search term and page size
	 * @param {String} term Search term
	 * @param {int} page Page for search term
	 */
	app.listData.prototype.searchTerm = function( term, page )
	{
		var _self = this;

		_self.term = term;

		if ( page !== undefined )
		{
			_self.requestConfig.page = page;
		}

		_self.loader.newLoader();

		if ( _self.term.length > 0 )
		{
			_self.getSearchData(term);

			if ( _self.filterController )
			{
				_self.filterController.hide();
			}
		}
		else
		{
			_self.filterController.resetAll();
			_self.filterController.show();
			_self.initData();
		}
	};

	app.listData.prototype.getSearchData = function(term)
	{
		var _self = this;

		var searchType = _self.type;

		var params = _self.search ? _self.search.getSearchParams( _self.requestConfig ) : {};
		params.fullObjectResponse = true;

		var subscriberObject = {
			url: app.common.createSearchPath( [ term, term + "*" ], [ searchType ], params ),
			method: "GET",
			callback: _self.dataSearch,
			target: _self
		};

		_self.startData( subscriberObject );
	};

	/**
	 * Initialise data
	 */
	app.listData.prototype.initData = function()
	{
		var _self = this;

		var dataPath = _self.path;

		if( _self.requestConfig.id && _self.requestConfig.id != -1 ){
			dataPath = _self.staffPath;
		}

		var subscriberObject = {
			url: app.common.createApiPath( dataPath, _self.requestConfig ),
			method: "GET",
			callback: _self.renderData,
			target: this
		};

		this.startData( subscriberObject );
	};

	/**
	 * start the data manager and fetch data
	 */
	app.listData.prototype.startData = function( config ) {

		core.data.manager.add( config );
	};

	/**
	 * delegate method of the scroll loader, called when a load of a new page
	 * is needed according to the loader
	 */
	app.listData.prototype.didRequestLoad = function() {
		var _self = this;

		_self.requestConfig.page++;
		if ( _self.term.length > 0 )
		{
			_self.searchTerm( _self.term );
		}
		else
		{
			_self.initData( _self.urlConfig );
		}
	};

	/**
	 * Method when the filters are cleared.
	 * @param {object} states States of the filters
	 */
	app.listData.prototype.filterCleared = function( states )
	{
		var _self = this;

		_self.filterUpdated( states );
	};

	/**
	 * When filters are updated, find compseason and load new page if it is different from the original
	 * @param {Object} states Filter dropdown states
	 * @param {Boolean} init Flag to indicate that the filter is initialised
	 * @param {Boolean} force Boolean to force new load
	 */
	app.listData.prototype.filterUpdated = function( states, init, force )
	{
		var _self = this;

		var references = [];
		var originalComp = _self.requestConfig.compSeasons;
		var originalClub = _self.requestConfig.id;

		var compSeasonsSelectedValue = _self.requestConfig.compSeasons;
		var clubsSelectedValue = _self.requestConfig.id;

		states.map( function( state )
		{
			switch( state.name )
			{
				case 'compSeasons':
					if ( state.state.id != -1 && state.active )
					{
						compSeasonsSelectedValue = state.state.id;
					}
					else
					{
						compSeasonsSelectedValue = undefined;
					}
					break;
				case 'clubs':
					clubsSelectedValue = state.state.id;
					break;
			}
		} );
	
		_self.requestConfig.page = 0;


		if( _self.initialRender ){
			setPageLoading( _self, _self.playerContainers[0] );
		}

		_self.requestConfig.compSeasons = compSeasonsSelectedValue;
		_self.requestConfig.id = clubsSelectedValue;
		_self.requestConfig.compSeasonId = compSeasonsSelectedValue;


		_self.initData();

	};


	/**
	 * Search data
	 * @param {Object} data Search data
	 */
	app.listData.prototype.dataSearch = function( data )
	{
		var _self = this;

		if ( data && data.hits )
		{
			var evaluatedPlayers = _self.search.evaluateHits( data.hits );
			_self.renderData( { content : evaluatedPlayers, pageInfo : _self.requestConfig } );
		}
	};

	/**
	 * When filters are updated, find compseason and load new page if it is different from the original
	 * @param {Object} data to render
	 * @param {Boolean} list type
	 * @param {Boolean} serach filter term
	 */
	app.listData.prototype.renderListData = function( data, listType, term )
	{
		var _self = this;

		var html = '';
		data.forEach( function( singleContent )
		{
			html += Mustache.render( app.templates[ _self.listTemplate ], singleContent );
		});
		_self.allTimeDataContainer[ 0 ].innerHTML = html ;
	};

	/**
	 * Render data for list
	 * @param {Object} data Render data
	 */
	app.listData.prototype.renderData = function( data )
	{


		var _self = this;
		var responseData = false;
		var lastPage = false;

		// If the data is a paginated list, check for last page
		if( data.pageInfo ){
			if( data.pageInfo.page == data.pageInfo.numPages ){
				lastPage = true;
			}
			// If not on the last page and there is no loader, create one
			else if ( !_self.loader.element ){
				_self.loader = new app.common.scrollLoader( _self.element, _self, true );
			}
		}
		// If data is not a paginated list treat as list page
		else if ( !data.content ){
				lastPage = true;
		}

		if( data ){
			responseData = data.content || data[ _self.staffPathLabel ];
		}

		if ( responseData )
		{
			var dataModels = getModelArray( responseData, _self.type );

			if ( _self.loader )
			{
				_self.loader.contentLoaded();
			}

			if ( dataModels.length < 1 || lastPage )
			{
				_self.loader.removeLoader();
			}

			_self.initialRender = true;

			var html = '';

			dataModels.forEach( function( singleContent )
			{
				html += Mustache.render( app.templates[ _self.template ], singleContent );
			});

			if ( dataModels.length === 0 && data.pageInfo.page < 1 )
			{
				html = Mustache.render( app.templates[ 'nodatalist' ], { label : i18n.lookup( 'label.nocontent' + _self.type ) } );
			}

			if ( data.pageInfo && data.pageInfo.page > 0 )
			{
				_self.playerContainers[ 0 ].innerHTML += html;
			}
			else
			{
				_self.playerContainers[ 0 ].innerHTML = html ;
			}
			if(_self.type === 'player') {
				common.getPhotosForContainer( _self.playerContainers[ 0 ] );
			}
		}
	};

	app.listData.prototype.filterUpdatedForTeam = function( states, init, force )
	{
		var _self = this;

		var references = [];

		_self.sectionTitle[ 0 ].innerHTML = states[ 0 ].state.name;

		var compSeasonsSelectedValue = _self.requestConfig.compSeasons;


		if ( (_self.requestConfig.compSeasons !==  states[ 0 ].state.id) || force )
		{
			setPageLoading( _self, _self.teamCardContainer[0] );
			_self.requestConfig.page = 0;

			_self.requestConfig.compSeasons = states[ 0 ].state.id;

			_self.initData();
		}
	};

	var init = function(){
		// initialise on results lists
		var w = document.querySelectorAll( '[data-widget="list-data"]' );
		w = Array.prototype.map.call( w, function( widget ){
			return new app.listData( widget, {} );
		} );
	};

	app.filterGroups.setData( init );

} )( PULSE.app, PULSE.core, PULSE.app.common, PULSE.I18N );

/*globals PULSE, PULSE.app */

( function( app ) {

	var widgets = document.querySelectorAll( '[data-widget="editorial-filtered-list"]' );
	for( i = 0; i < widgets.length; i++ ) {


	}

	/**
	 *
	 * @param element
	 * @param config
	 */
	app.filteredEditorialList = function( element, config ) {
		var _self = this;

		_self.filterController = new app.common.listFilterController( widgets[ i ], {
			dropdowns : app.filterGroups.editorial,
			// if instantiating from a component you should provide a
			// reference to the self/this of the component so that
			// delegate callbacks can be fired
			delegate : false
		} );


	}






} )( PULSE.app );

( function( app, i18n, core, common ) {

    /**
     * @namespace app.d.private
     */

    var getOfficialForType = function( officials, role, roleShortLabel ) {
        if ( officials.length > 0 )
        {
            for ( var i = 0; i < officials.length; i++ )
            {
                if ( officials[ i ].role === role )
                {
                    officials[i].roleShort = roleShortLabel;
                    return officials[ i ];
                }
            }
        }
        return {};
    };

    /**
     * render the match item from data provided, can be used to re-render
     * or to re - render the view
     *
     * @param {app.d} _self contextual reference to the calling instance object
     * @param {object} match the match object containing data to render
     */
    var renderMatchItem = function( _self, match ) {

        var markup = false;

        //make sure we have actual fixture info
        if( match.fixture ){

            var venue = true;
            var hasOfficials = false;
            var officialsArray = undefined;
            if ( match.fixture.matchOfficials )
            {
                venue = false;
                hasOfficials = true;

                var officials = [ 'MAIN', 'LINESMAN_1', 'LINESMAN_2', 'FOURTH_OFFICIAL' ];
                var officialsShortLabel = [
                    i18n.lookup( 'label.referee.short' ),
                    i18n.lookup( 'label.assistant.short' ) + ' 1',
                    i18n.lookup( 'label.assistant.short' ) + ' 2',
                    i18n.lookup( 'label.official.short' )
                ];

                officialsArray = []
                for ( var i = 0; i < officials.length; i++ )
                {
                    officialsArray.push( getOfficialForType( match.fixture.matchOfficials, officials[ i ], officialsShortLabel[i] ) );
                }
            }

            var isPL = false;
            if( match.fixture.gameweek.compSeason.competition.id === app.competition.FIRST ) {
                isPL = true;
            }

            var shootout = ( match.fixture.penaltyShootouts && match.fixture.penaltyShootouts.length > 1 ) ? { penScore: [ match.fixture.penaltyShootouts[ 0 ].score, match.fixture.penaltyShootouts[ 1 ].score ] } : undefined;

            markup = Mustache.render( app.templates.matchitembase, {
                isPL : isPL,
                quickviewLabel : i18n.lookup( 'label.quickview' ),
                matchJson : JSON.stringify( match.fixture ),
                upcoming: match.fixture.status === "U",
                fixture: match.fixture,
                venue : venue,
                officials : officialsArray,
                hasOfficials : hasOfficials,
                live: match.fixture.status === "L",
                abandoned : match.fixture.status === "A",
                homeTeam: match.teams ? match.teams[ 0 ] : false,
                awayTeam: match.teams ? match.teams[ 1 ] : false,
                onPenaltiesLabel: i18n.lookup( 'label.onpenalties' ),
                shootout: shootout,
                // if we already have a surrounding element then we do not need to
                // wrap the <a> in an <li> likely because we have already
                // instantiated from an already existing div ( server rendered )
                wrap: _self.element ? false : true,
                translator: app.common.templateTranslator,
                renderTeamsDivider: function() {
                    // team divider will either be a score or will be a
                    // kickoff time
                    return function( text, render ) {

                        if( this.fixture.kickoff.completeness == 1 || this.fixture.kickoff.completeness == 3 ){
                            if( this.fixture.status === "U" ) {
                                var time = new Date( this.fixture.kickoff.millis );
                                time = time.getHours() + ":" + ( time.getMinutes() < 10 ? "0" + time.getMinutes() : time.getMinutes() );

                                return "<time datetime=\"" +
                                    time + "\">"  + time +  "</time>";
                            }
                            else if ( this.fixture.status === 'A' )
                            {
                                var abandonedLabel = i18n.lookup( 'label.match.abandoned.short' );
                                return "<span class=\"score\">" +
                                    abandonedLabel + "<span>-</span>" +
                                    abandonedLabel + "</span>";
                            }
                            else {
                                var penaltyShootoutClass = this.fixture.penaltyShootouts ? 'has-penalties' : '';

                                var score1 = ( this.fixture.teams[ 0 ].score != undefined ) ? this.fixture.teams[ 0 ].score : '';
                                var score2 = ( this.fixture.teams[ 1 ].score != undefined ) ? this.fixture.teams[ 1 ].score : '';

                                //build the score as a html element and return it
                                return '<span class="score ' + penaltyShootoutClass + '">' +
                                    score1 + "<span>-</span>" +
                                    score2 +	"</span>";
                            }
                        }
                        else{
                            return "<time>" + i18n.lookup( 'label.tbc' ) + "</time>";
                        }
                    }
                },
                getShortName: function() {
                    return function( text, render ) {
                        //return short name and fall back to full name if club object is not available
                        if( this.fixture.teams[ text ].team && this.fixture.teams[ text ].team.club
                            && this.fixture.teams[ text ].team.club.shortName ) {
                            return this.fixture.teams[ text ].team.club.shortName;
                        } else {
                            return this.fixture.teams[ text ].team.name;
                        }
                    }
                },
                getVenueName: function() {
                    return function( text, render ) {
                        if ( this.fixture.ground.city )
                        {
                            return this.fixture.ground.name + ", " + this.fixture.ground.city;
                        }
                        else
                        {
                            return this.fixture.ground.name;
                        }
                    }
                },
                getMatchUrl: function() {
                    return function( text, render ) {
                        return common.generateContentUrl( 'match', this.fixture.id );
                    }
                },
                getOpta: function() {
                    return function( text, render ) {
                        // return abbreviation, this will be replaced by the opta ids when this data is
                        // available per team, at least in the case of class names
                        if( this.fixture.teams[ text ].team && this.fixture.teams[ text ].team.altIds && this.fixture.teams[ text ].team.altIds.opta ) {
                            return this.fixture.teams[ text ].team.altIds.opta;
                        }
                    }
                },
                getMatchTime: function() {
                    return function( text, render ) {

                        if( this.fixture.clock && this.fixture.clock.secs ) {
                            return common.getEventTime( this.fixture );
                        }
                    }
                },
                getClassForState: function() {
                    return function( text, render ) {

                        var state = render( text );

                        switch( state ) {
                            case "L":
                                return "live";
                                break;
                            case "U":
                                return "preMatch";
                                break;
                            case "C":
                                return "postMatch";
                                break;
                            default:
                                return "preMatch";
                        }
                    }
                }
            } );
        }

        if( _self.element && !_self.container ) {
            _self.element.innerHTML = markup;
            _self.detailsContainer = _self.element.querySelector( 'a.fixture' );

        } else if( !_self.element && _self.container ) {

            _self.element = core.dom.appendDomString( _self.container, markup )
        }

        renderMatchDetails( _self, match, _self.detailsContainer );
        if ( _self.resultList )
        {
            _self.resultList.initModal();
        }

    };

    /**
     *
     * @param {PULSE.app.competitionMatchListItem} _self context reference
     * @param {object} match match item that will be used to render match info
     * @param container
     */
    var renderMatchDetails = function( _self, match, container ) {


        //each match will have a hash that is keyed on the
        //minutes of a game, and each key will have an array of events that occurred
        // in that minute, as its possible to have multiple in the same minute

        //we will keep a type with each event also so we know how to render them

        //each team has a hash for each event type we need to
        //convert this into a stream of events for each team
        if( match.teams && match.teams.length ) {

            var eventStreams = [ {}, {} ];

            for( var x = 0; x < match.teams.length; x++ ) {

                var availableEvents = Object.keys( match.teams[ x ] );

                for( var y = 0; y < availableEvents.length; y++ ) {

                    if( availableEvents[ y ] !== "teamList"  ) {
                        //team list should not be a part of the event stream

                        for( var l = 0; l < match.teams[ x ][ availableEvents[ y ] ].length; l++ ) {

                            var evtData = match.teams[ x ][ availableEvents[ y ] ][ l ];

                            var event = {
                                type: availableEvents[ y ],
                                data: evtData
                            };

                            // check if we have added any events at this timestamp yet
                            // if not create a new array
                            if( !eventStreams[ x ][ evtData.time.secs ] ) {
                                eventStreams[ x ][ evtData.time.secs ] = [];
                            }
                            eventStreams[ x ][ evtData.time.secs ].push( event );
                        }
                    }
                }
            }

            //sort it out
            var sorted = eventStreams.map( function( el, idx, arr ) {
                core.common.quicksort( Object.keys( el ), 0, Object.keys( el ).length - 1,
                    function( a, b ) {
                        return a < b;
                    })
            } );

            var details = Mustache.render( app.templates.matchitemdetails, {

                eventStreamHome: { stream: eventStreams[ 0 ],
                    map: sorted[ 0 ] },
                eventStreamAway: { stream: eventStreams[ 1 ],
                    map: sorted[ 1 ] }

            } );

            if( container ) {
                container.innerHTML = container.innerHTML + details;
            }
        }

    };
    /**
     * get a url that can be used to receive full match information
     *
     * @param {app.competitionListMatchItem} _self contextual reference to the calling instance object
     * @param {integer} matchId the match id to get info for
     * @returns {string} fixture information url
     */
    var makeMatchInfoUrl = function( _self, matchId ) {
        return app.common.createApiPath( 'fixtures.single', { "id": matchId } );
    };
    /**
     * competition list match item constructor
     *
     * @param element
     * @param matchData
     * @param container
     *
     * @constructor
     */
    app.competitionMatchListItem = function( element, matchData, container, resultList ) {
        var _self = this;

        _self.resultList = resultList;
        _self.container = container;
        _self.matchId = false;
        _self.matchData = false;
        _self.matchKickoff = false;
        _self.currentState = false;
        _self.element = false;
        _self.detailsContainer = false;
        _self.subscriberController = false;
        //_self.quickViewController = app.getQuickViewInstance();
        _self.subscriber = {
            method: "GET",
            callback: _self.update,
            forceCallback: true,
            target: _self,
            interval: 6000
        };

        // initialise purely from data ( fixtureSummary )
        if( !element && matchData ) {
            _self.matchData = matchData;
            _self.matchId = _self.matchData.id || false;
            _self.matchKickoff = _self.matchData.kickoff.millis || false;
            _self.currentState = _self.matchData.status || false;

            renderMatchItem( _self, { fixture: matchData } );
        }

        // initialise from an already created item
        if( element ) {
            _self.element = element;
            _self.matchId = _self.element.getAttribute('data-comp-match-item' ) || false;
            _self.matchKickoff = _self.element.getAttribute( 'data-comp-match-item-ko' ) || false;
            _self.currentState = _self.element.getAttribute( 'data-comp-match-item-status' ) || false;
        }

        _self.subscriber.url = makeMatchInfoUrl( _self, _self.matchId );

        // we've got a live one here lads!
        if( _self.currentState === "L" ) {
            _self.subscriberController = core.data.manager.add( _self.subscriber );
        }
    };

    /**
     * refresh the information in the match div
     *
     * @param data
     * @param subscriber
     */
    app.competitionMatchListItem.prototype.update = function( data, subscriber ) {
        var _self = this;

        //update the state and other internal state
        _self.currentState = data.fixture.status;
        _self.matchData = data;

        //render using the new data
        renderMatchItem( _self, data );

        // we should tell the data manager to stop polling
        // if the match is now complete
        if( _self.currentState === "C" && _self.subscriberController ) {
            _self.subscriberController.stop();
        }

        //console.log( "got update on match data for matchID : ", _self.matchId, "\n" ,data, subscriber );
    };


} )( PULSE.app, PULSE.I18N, PULSE.core, PULSE.app.common );
/*globals PULSE, PULSE.app */

(function ( app, core, i18n ) {

    var DAYS = [ 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday' ];
    var MONTHS = [ 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december' ];

    var getIncompleteMatches = function ( matchItemWidgets ) {
        var incompleteMatches = [];
        // initialise on results lists
        for ( var i = 0; i < matchItemWidgets.length; i++ ) {
            var matchWidget = matchItemWidgets[ i ];
            var matchStatus = matchWidget.getAttribute('data-comp-match-item-status');

            if ( matchStatus !== "C" ) {
                var matchId = matchWidget.getAttribute('data-comp-match-item');
                incompleteMatches[ matchId ] = new app.competitionMatchListItem(matchWidget, false, false);
            }
        }

        return incompleteMatches;

    };

    /**
     * we can draw a match list if we are provided with the data, instead of initialising from a
     * div
     *
     * @param {object} data the data containing the matchDay property with the match date and a content
     * property that has an object keyed on compeition id
     */
    var drawMatchList = function ( data, append ) {
        var _self = this;
        var listHTML;
        

        if ( data.matchDay === i18n.lookup('label.tbc.date') ) {
            //create the basic date header
            listHTML = Mustache.render(app.templates.fullmatchday, {
                date: data.matchDay,
                day: data.matchDay,
                longDate: data.matchDay,
                shortDate: data.matchDay
            });
        }
        else {
            // Generate date based on first kickoff
            var matches = data.content[ Object.keys(data.content)[ 0 ] ];
            var firstKickoff = matches[ 0 ].kickoff.millis;
            var date = new Date(firstKickoff);

            //create the basic date header
            listHTML = Mustache.render(app.templates.fullmatchday, {
                date: data.matchDay,
                day: date.getDate(),
                longDate: moment(date).locale(app.language).format('dddd D MMMM YYYY'),
                shortDate: moment(date).locale(app.language).format('ddd D MMM YYYY'),
                monthLong: i18n.lookup('label.date.month.' + MONTHS[ date.getMonth() ]),
                monthShort: i18n.lookup('label.date.month.short.' + MONTHS[ date.getMonth() ]),
                dayLong: i18n.lookup('label.date.day.' + DAYS[ date.getDay() ]),
                dayShort: i18n.lookup('label.date.day.short.' + DAYS[ date.getDay() ])
            });
        }

        // 0. long time div
        // 1. short time div
        // 2. match container

        if ( !_self.element ) {
            _self.element = core.dom.appendDomString(_self.container, listHTML, true, 2);
        }

        if ( !data.content ) {
            return;
        }

        //iterate over each comp type, on first draw the comp name before
        var comps = Object.keys(data.content);

        for ( var i = 0; i < comps.length; i++ ) {
            var refModel;

            if ( data.content[ comps[ i ] ][ 0 ].matchOfficials ) {
                refModel = {
                    matchLabel: i18n.lookup('label.match'),
                    refLabel: i18n.lookup('label.referee'),
                    asstLabel1: i18n.lookup('label.assistantref.short') + ' 1',
                    asstLabel2: i18n.lookup('label.assistantref.short') + ' 2',
                    asstLabel3: i18n.lookup('label.official')
                }
            }
            if ( append ){
                var compList = _self.element.querySelector('ul');
            }
            else{
                // create a match ul and the competiton image div
                // function will return <ul>
                var compList = core.dom.appendDomString(_self.element, Mustache.render(app.templates.matchlist, {
                    comp: data.content[ comps[ i ] ][ 0 ].gameweek.compSeason.competition,
                    refModel: refModel
                }), true, false).querySelector("ul");
            }

            for ( var j = 0; j < data.content[ comps[ i ] ].length; j++ ) {
                //create new match
                new app.competitionMatchListItem(false, data.content[ comps[ i ] ][ j ], compList, _self.resultList);
            }
        }

    };

    /**
     * competition list match constructor
     *
     * __________________________________
     * | FIX/RES LIST
     * |
     * | __________________________
     * | | COMP MATCH LIST
     * | |
     * | | _______________________
     * | | | COMP LIST MATCH ITEM
     * | | _______________________
     * | | | COMP LIST MATCH ITEM
     * | | _______________________
     * | | | COMP LIST MATCH ITEM
     * |
     * | __________________________
     * | | COMP MATCH LIST
     * | |
     * | | _______________________
     * | | | COMP LIST MATCH ITEM
     * | | _______________________
     * | | | COMP LIST MATCH ITEM
     * | | _______________________
     * | | | COMP LIST MATCH ITEM
     *
     * ...
     *
     * competition matches list represents a match day view, it can contain
     * one or more match days, but all must be contained / played on the
     * same day
     *
     * competition matches will ;
     *  - render a container with the current date and render a match list
     *  OR
     *  - attach itself to a already created container that conforms to the
     *    same format as its template
     *
     * the list is responsible for creating/rendering/refreshing the matches list
     *
     * @param element
     * @param container
     * @param matchDayData
     * @constructor
     */
    app.competitionMatchesList = function ( element, container, matchDayData ) {
        var _self = this;

        _self.element = element;
        _self.container = container;
        _self.incompleteMatches = [];
        _self.matchDayData = matchDayData;
        _self.resultList = matchDayData.resultList;

        if ( _self.element ) {
            //we want something other than just complete matches
            var matchItemWidgets = _self.element.querySelectorAll('[data-comp-match-item]');
            _self.incompleteMatches = getIncompleteMatches(matchItemWidgets);
        } else if ( _self.container && matchDayData ) {
            drawMatchList.call(_self, matchDayData);
        }
    };


    app.competitionMatchesList.prototype.append = function ( competitions ) {
        var _self = this;

        _self.matchDayData.content = core.object.extend( true, _self.matchDayData.content, competitions );
        drawMatchList.call(_self, _self.matchDayData, true);

    };

    /**
     * re-render the list of matches with new data, maintains already rendered container divs
     *
     * @param {object} todaysUpdatedMatches list of matches that are keyed on the compseason ID
     */
    app.competitionMatchesList.prototype.refresh = function ( todaysUpdatedMatches ) {
        var _self = this;
        if ( todaysUpdatedMatches ) {
            //refresh means we already have a container
            drawMatchList.call(_self, todaysUpdatedMatches);
        }
    };

})(PULSE.app, PULSE.core, PULSE.I18N);
( function( app, core, ui, common, i18n ) {

	/**
	 * @namespace app.resultsList.private
	 */


	/**
	 * match lists will be instantiated on markup components that contain matches that
	 * are happening today as these may need updating, if any matches are live
	 *
	 * @param {PULSE.app.resultsList} _self contextual reference to calling instance object
	 */
	var initialiseMatchLists = function( _self ) {

		var potentialMatchLists = _self.element.querySelectorAll( '[data-competition-matches-list]' );
		var today = new Date().toISOString().split( 'T' )[ 0 ];

		for( var d = 0; d < potentialMatchLists.length; d++  ) {

			var widget = potentialMatchLists[ d ];
			if( widget.getAttribute('data-competition-matches-list' ) === today ) {
				//assume we don't have two lists that represent the same day
				//so we can break the loop at this point
				_self.todaysMatches = new app.competitionMatchesList( widget, false, {
					poll: true,
					statuses : _self.validMatchStates
				} );

				if( _self.validMatchStates === "C" ) {
					//continue polling for this data
					PeriodicallyUpdateMatchesList( _self, today );
				}

				break;
			}
		}
	};

	/**
	 * if a match set needs to update for new results then set up polling
	 *
	 * @param _self
	 * @param matchDay
	 * @constructor
	 */
	var PeriodicallyUpdateMatchesList = function( _self, matchDay ) {

		// https://api.test.platform.pulselive.com/football/fixtures?page=0&pageSize=10&sort=asc&startDate=2015-05-24&endDate=2015-05-24&statuses=C&compSeasons=23

		var base = generateFixturesUrl( _self, 0, 100, _self.sortOrder, _self.validMatchStates );
		base += "&endDate=" + matchDay + "&startDate=" + matchDay;

		_self.todaysMatchSub = {
			url: base,
			target: _self,
			method: "GET",
			forceCallback: true,
			callback: _self.gotTodaysMatchesUpdate,
			interval: 6000
		};

		if( _self.todaysMatches && matchDay ) {

			_self.todaysMatchSubRef = core.data.manager.add( _self.todaysMatchSub );

		}
	};



	/**
	 * get the next page of fixtures, should be updated to get next gameweek set, once the
	 * apis are avialable
	 *
	 * @param {PULSE.app.resultsList} _self contextual reference to calling instance object
	 */
	var getNextPage = function( _self ) {

		page = parseInt( _self.pageNumber );
		page++;

		_self.NextPageSubscriber = {
			url: generateFixturesUrl( _self, page, _self.pageSize, _self.sortOrder, _self.validMatchStates ),
			target: _self,
			method: "GET",
			callback: _self.gotNextPage,
			forceCallback: true
		};

		core.data.manager.add( _self.NextPageSubscriber );
	};

	/**
	 * set the view to a loading state and disable any interaction with the filters until loading has completed
	 *
	 * @param {PULSE.app.resultsList} _self contextual reference to calling instance object
	 */
	var setPageLoading = function( _self, container ) {
		_self.loaderMarkup  = _self.loaderMarkup || Mustache.render( app.templates.scrollloader, { load : i18n.lookup( 'label.loadingmore' ) } );
		container.innerHTML = _self.loaderMarkup;
	};

	/**
	 * get a new page based on the filter parameters
	 *
	 * @param {PULSE.app.resultsList} _self contextual reference to calling instance object
	 */
	var getNewPage = function( _self ) {

		_self.pageNumber = 0;

		_self.NewPageSubscriber = {
			url: generateFixturesUrl( _self, _self.pageNumber, _self.pageSize, _self.sortOrder, _self.validMatchStates ),
			target: _self,
			method: "GET",
			callback: _self.gotFreshPage,
			forceCallback: true
		};
		core.data.manager.add( _self.NewPageSubscriber );

	};

	/**
	 * get an api url to retrieve the fixtures
	 *
	 * @param _self
	 * @param page
	 * @param pageSize
	 * @param sortOrder
	 * @param statesAllowed
	 * @returns {string}
	 */
	var generateFixturesUrl = function( _self, page, pageSize, sortOrder, statesAllowed ) {

		//build full state of the request, using keys
		var state = getFilterStatesAsParams( _self, _self.filterState );
		for ( var key in state )
		{
			if ( !state[ key ] )
			{
				state[ key ] = undefined;
			}
		}
		state.page =  page;
		state.pageSize = pageSize;
		state.sort = sortOrder;
		state.statuses = statesAllowed;
		state.altIds = true;
		state.detail = _self.detail;
		if ( _self.sort )
		{
			state.sort = _self.sort;
		}
		if ( _self.teams > 0 )
		{
			state.teams = _self.teams;
		}

		if ( _self.startDate )
		{
			state.startDate = _self.startDate;
		}

		if ( _self.endDate )
		{
			state.endDate = _self.endDate;
		}

		return app.common.createApiPath( 'fixtures.all', state );
	};

	/**
	 * get an object with param keys as a url string
	 *
	 * @param _self
	 * @param state
	 * @returns {string}
	 */
	var objectToUrlParams = function( _self, state ) {

		var paramName = Object.keys( state );
		var paramString = "";
		var added = 0;

		for( var x = 0; x < paramName.length; x++ ) {

			if( state[ paramName[ x ] ] !== false ) {
				var leading = added === 0 ? "?" : "&";
				paramString += ( leading + paramName[ x ] + "=" + state[ paramName[ x ] ] );
				added++
			}
		}

		return paramString;
	};

	/**
	 * return the state as a stripped down object
	 *
	 * @param {app.resultsList} _self contextual reference to the calling instance
	 * @param  {app.dropDownItemState[]} state state array of filter list
	 * @returns {string}m the generated url
	 */
	var getFilterStatesAsParams = function( _self, state ) {

		var simpleState = {};

		// filters should be named according to the api request
		// parameter that they represent
		for( var d = 0; d < state.length; d++ ) {

			if( state[ d ].state.id != -1 && state[ d ].active ) {
				simpleState[ state[ d ].name ] = state[ d ].state.id;
			} else if( state[ d ].name == "comps" ) {

				// selected all competition, unlike others we need to
				// narrow by these specifically
				var pString = "";
				for( var i = 0; i < state[ d ].state.list.length; i++ ) {
					pString += state[ d ].state.list[ i ].id;

					if( i < state[ d ].state.list.length -1  ) {
						pString += ",";
					}
				}
				simpleState[ state[ d ].name ] = pString;
			} else {
				simpleState[ state[ d ].name ] = undefined;
			}
		}
		if( simpleState.comps && !simpleState.compSeasons ){
			simpleState.compSeasons = app.filterData.getCurrentCompSeasonId(simpleState.comps);
		}


		return simpleState;
	};

	var generateCalendarEvent = function( element )
	{
		var status = element.getAttribute( 'data-comp-match-item-status' );
		var icsContent = '';
        if ( status != 'C' )
        {
	        var startTime = parseInt( element.getAttribute( 'data-comp-match-item-ko' ) );
		    var endTime = startTime + ( 1.75 * 3600000 );
		    var matchId = element.getAttribute( 'data-comp-match-item' );
		    var homeTeam = element.getAttribute( 'data-home' );
		    var awayTeam = element.getAttribute( 'data-away' );
		    var competition = element.getAttribute( 'data-competition' );
		    var location = element.getAttribute( 'data-venue' );

		    var title = homeTeam + " v  " + awayTeam;
		    var details = title + " - " + competition;

		    var startDate = new Date( startTime );
		    var endDate = new Date( endTime )
		    var startTimeString = moment( startDate ).locale( app.language ).format( 'YYYYMMDD' ) + 'T' + moment( startDate ).locale( app.language ).format( 'HHmm' ) + '00';
		    var endTimeString = moment( endDate ).locale( app.language ).format( 'YYYYMMDD' ) + 'T' + moment( endDate ).locale( app.language ).format( 'HHmm' ) + '00';

		    icsContent = 'BEGIN:VEVENT\r\nDTEND:'  + endTimeString + '\r\nUID:'  + matchId + '\r\nDTSTAMP:20120315T170000Z\r\nSUMMARY:' + title +'\r\nLOCATION:' + location + '\r\nDESCRIPTION:' + details + '\r\nDTSTART:' + startTimeString + '\r\nEND:VEVENT\r\n';
		}

	    return icsContent;
	};

	/**
	 * render a fixture list
	 *
	 * @param {app.resultsList} _self contextual reference to the calling instance
	 * @param {HTMLElement} container the container to append divs to
	 * @param {boolean} append weather to append or to replace content in the container
	 * @param {object} matchesByDay object with days as key that is used to render page
	 */
	var renderFixturesPage = function( _self, container, append, matchesByDay  ) {

		if( _self.todaysMatchSubRef && !append ) {
			//stop updating any match day sets
			_self.todaysMatchSubRef.stop();
		}

		//competition lists will always append, so
		// help out by clearing the div for them
		if( !append ) {
			container.innerHTML = "";
		}

		var newMatchDays = [];
		var matchDays = Object.keys( matchesByDay );

		if ( _self.loader )
		{
			_self.loader.contentLoaded();

			if ( matchDays.length < 1 )
			{
				_self.loader.removeLoader();
			}
		}

		if ( !append && matchDays.length < 1 )
		{
			if ( _self.filterState[0].state.id == app.competition.FIRST ){
				container.innerHTML = Mustache.render( app.templates[ 'nodatafixture' ], { label : i18n.lookup( 'label.nofixtures.pl' ) } );
			}
			else
			{
				container.innerHTML = Mustache.render( app.templates[ 'nodatafixture' ], { label : i18n.lookup( 'label.nocontentmatches' ) } );
			}

		}

		for( var y = 0; y < matchDays.length; y++ ) {

			var day = matchDays[ y ];
			var competitions = {};
			var matchDayFixtures = matchesByDay[ matchDays[ y ] ];

			for( var f = 0; f < matchDayFixtures.length; f++ ) {

				if( !competitions[ matchDayFixtures[ f ].gameweek.compSeason.competition.id ] ) {
					competitions[ matchDayFixtures[ f ].gameweek.compSeason.competition.id ] = [];
				}
				competitions[ matchDayFixtures[ f ].gameweek.compSeason.competition.id ].push(  matchDayFixtures[ f ] );
			}

			var ml;

			// If matchDay already exists in markup append with new matches
			if( _self.matchDays[ day ] && append ){
				_self.matchDays[ day ].append( competitions );
			}
			//Otherwise create a new matchDay
			else{
				ml = new app.competitionMatchesList( false, container, {
					matchDay: day,
					content: competitions,
					poll: day === new Date().toISOString().split( 'T' )[ 0 ],
					statuses: _self.validMatchStates,
					resultList : _self
				} );

				_self.matchDays[ day ] = ml;

				if( day === new Date().toISOString().split( 'T' )[ 0 ] ) {

					_self.todaysMatches = ml;

					if( _self.validMatchStates === "C" ) {
						//continue polling for this data
						PeriodicallyUpdateMatchesList( _self, day );
					}
				}

			}

		}

	};

	/**
	 *
	 * @param {app.resultsList} _self contextual reference to the calling instance
	 */
	var getMatchesByDay = function( _self, data ) {
		//arrange matches into match days
		var matchesByDay = {};

		if( data.content && data.content.length ) {

			var match;

			for( var t = 0; t < data.content.length; t++ ) {

				match = getMatchModel( data.content[ t ] );
				// generate a utc date from the kickoff time, convert it
				// to iso, and get only the date string ( before the T ) from
				// the iso format

				if( !matchesByDay[ match.matchDate ] ) {
					matchesByDay[ match.matchDate ] = [];
				}

				//sort order from api will be maintained in hash
				matchesByDay[ match.matchDate ].push( match );

			}
		}

		return matchesByDay;

	};

	/**
	 * Get model for match
	 * @param {object} match Match data
	 * @param {HtmlElement} activator Element to activate fixture modal
	 */
	var getMatchModel = function( match, activator )
	{

		match.matchDate = i18n.lookup( 'label.tbc.date' );
		match.kickOffTime = i18n.lookup( 'label.tbc' );

		switch( match.kickoff.completeness ){
			case 2:
				match.matchDate = moment( match.kickoff.millis ).format( 'dddd D MMMM YYYY' );
				match.kickOffTime = i18n.lookup( 'label.tbc' );
				break;
			case 3:
				var koDate = new Date( match.kickoff.millis );
				match.matchDate = moment( match.kickoff.millis ).format( 'dddd D MMMM YYYY' );
				match.kickOffTime = moment( koDate ).locale( app.language ).format( 'HH:mm' );
				break;
			case 1:
				match.matchDate = i18n.lookup( 'label.tbc.date' );
				var koDate = new Date( match.kickoff.millis );
				match.kickOffTime = moment( koDate ).locale( app.language ).format( 'HH:mm' );
				break;
		}

		match.teams.map( function( team )
		{
			team.opta = ( team.team.altIds && team.team.altIds.opta ) ? team.team.altIds.opta :  "";
			team.url = common.generateContentUrl( 'team', team.team.club.id, team.team.club.name.replace(' ', '-') );
		} );
		match.url = common.generateContentUrl( 'match', match.id );
		if ( activator )
		{
			match.viewMatchLabel = i18n.lookup( 'label.viewmatch' );
			if ( !match.neutralGround && match.teams.length > 0 && match.ground )
			{
				match.groundLink = '/clubs/' + match.teams[ 0 ].team.club.id + '/' + match.teams[ 0 ].team.club.name.replace(new RegExp(' ', 'g'), '-') + '/stadium';
				match.stadiumInfoLabel = i18n.lookup( 'label.stadium.information' );
			}

			match.downloadCalendarLabel = i18n.lookup( 'label.addToCal' );
			match.previousResulsLabel = i18n.lookup( 'label.previousresults' );
			match.previousMeetingsLabel = i18n.lookup( 'label.previousmeeting' );
			match.standingsLabel = i18n.lookup( 'label.standings' );
			match.tableLabels = {
				pos : i18n.lookup( 'label.short.position' ),
				team : i18n.lookup( 'label.team' ),
				pl : i18n.lookup( 'label.short.played' ),
				gd : i18n.lookup( 'label.goaldifference' ),
				pts : i18n.lookup( 'label.short.points' )
			}
		}

		return match;
	}

	/**
	 * Get teamIds from match
	 *
	 * @param {object} match Match data
	 */
	var getTeamIds = function( match )
	{
		var teams = [];
		if ( match.teams )
		{
			match.teams.forEach( function( team )
			{
				teams.push( team.team.id );
			} );
		}
		return teams;
	}

	/**
	 * Get standings for teams in match
	 *
	 * @param {object} match Match data
	 * @param {objecy} tables Standings tables
 	 */
	var getTeamStandings = function( match, tables )
	{
		var teamArray = getTeamIds( match );
		var standingsArray = [];
		tables.forEach( function( table )
		{
			table.entries.forEach( function( entry )
			{
				if ( teamArray.indexOf( entry.team.id ) > -1 )
				{
					entry.movement = 'none';
					if ( entry.position < entry.startingPosition )
					{
						entry.movement = 'up';
					}
					else if( entry.startingPosition < entry.position )
					{
						entry.movement = 'down';
					}
					entry.url = common.generateContentUrl( 'club', entry.team.club.id, entry.team.club.name.replace(' ', '-') );
					entry.teamName = entry.team.club.shortName || entry.team.name;
					standingsArray.push( entry );
				}
			} );
		} );

		return standingsArray;
	}

	/**
	 * construct a new results list
	 *
	 * @param {HTMLElement} element dom node to use as widget view
	 */
	app.resultsList = function( element ) {
		var _self = this;

		_self.element = element;
		_self.fixtures = _self.element.querySelector( 'section.fixtures' );
		_self.sectionTitle = _self.element.querySelector( '.subHeader' );
		_self.todaysMatches = false;
		_self.matchDays = {};
		_self.filterState = false;
		_self.filterInitialised = false;
		_self.multipleBroadcastersModals = [];

		_self.fixturesIds = element.getAttribute( 'data-fixturesids' );

		// for fetching more pages
		_self.pageSize = _self.element.getAttribute( 'data-page-size' );
		_self.pageNumber = _self.element.getAttribute( 'data-page' );
		_self.pagesTotal = false;
		_self.sortOrder = _self.element.getAttribute( 'data-sort-order' );
		_self.validMatchStates = _self.element.getAttribute( 'data-match-states' );
		_self.filterListConfig = _self.element.getAttribute( 'data-filter-list' ) || _self.element.getAttribute( 'data-team-type' );
		_self.refereeAppointments = _self.element.getAttribute( 'data-referee-appointments' );
		_self.teams = _self.element.getAttribute('data-team');
		_self.compSeasons = _self.element.getAttribute('data-comp-seasons');
		_self.comps = _self.element.getAttribute('data-comps' );
		_self.lastConfig = { compSeasons : parseInt( _self.compSeasons ), comps : parseInt( _self.comps ) };
		_self.sort = _self.element.getAttribute('data-sort' );
		_self.startDate = _self.element.getAttribute( 'data-start-date' );
		_self.endDate = _self.element.getAttribute( 'data-end-date' );

		_self.generateFixturesCalendar = _self.element.getElementsByClassName( 'generateFixturesCalendar' );

		_self.detail = _self.element.getAttribute( 'data-detail' );
		if ( _self.detail === 'DETAILED' )
		{
			_self.detail = 2;
		}
		else
		{
			_self.detail = undefined;
		}

		if ( _self.sort === 'DESCENDING' )
		{
			_self.sort = 'desc';
		}
		else
		{
			_self.sort = undefined;
		}

		_self.loader = new app.common.scrollLoader( _self.fixtures, _self, true );

		_self.filterElement = element.querySelector( '[data-widget="results-filtered-list-filter"]' );

		var dropdowns;
		if ( _self.validMatchStates && _self.validMatchStates != "C" ) {
			dropdowns = app.filterGroups.Fixtures[ _self.filterListConfig ];

		} else {
			dropdowns = app.filterGroups.Results[ _self.filterListConfig ];
		}

		//if it's the referees' appointments page
		if ( _self.refereeAppointments ) {
			dropdowns = app.filterGroups.referee.appointments;
		}

		if ( _self.teams && _self.teams != "-1" && dropdowns && dropdowns.length > 0 )
		{
			dropdowns[ 0 ].defaultOptionId = 0;
		}

		if ( _self.teams > 0 )
		{
			dropdowns = dropdowns.filter(function( obj ) {
			    return obj.name !== 'teams';
			});
		}
		else
		{
			_self.lastConfig.teams = undefined;
		}
		_self.filterController = new app.common.listFilterController( _self.filterElement , {
			dropdowns : dropdowns,
			delegate : _self
		} );

		_self.initModal();

		initialiseMatchLists( _self );

		if(_self.fixturesIds) {
			_self.initBroadcastData( _self.fixturesIds );
		}

		_self.setListeners();
	};

	//implement the filter controller delegate prototype
	app.resultsList.prototype = Object.create( app.common.filterControllerDelegate.prototype );

	core.object.extend( app.resultsList.prototype, app.common.scrollLoaderDelegate.prototype );

		app.resultsList.prototype.setListeners = function () {
						var _self = this;
						var fixtureListener = new common.fixtureListener();

						_self.element.addEventListener('click', fixtureListener.redirectToMatchCenter);
						_self.element.addEventListener('keypress', fixtureListener.redirectToMatchCenter);
		};

	app.resultsList.prototype.initBroadcastData = function( fixtureIds )
	{
		var _self = this;

		var config = {};
		config.comps = app.competition.FIRST;
		config.fixtureIds = encodeURIComponent(fixtureIds);
		config.pageSize = 100;
		config.page = 0;

		var subscriberObject = {
			url : app.common.createApiPath( 'broadcasting-schedule.all', config ),
			method: "GET",
			callback: _self.renderBroadcastingSchedule,
			forceCallback: true,
			target: this
		};

		core.data.manager.add( subscriberObject );

	};

	/**
		* NB: Also in broadcastSchedule. It initialises and updates each modal for each fixture
		*/
	app.resultsList.prototype.initBroadcastModals = function () {
     //NB: This is also in broadcastSchedule
     var _self = this;

					for ( var i = 0; i < _self.multipleBroadcastersModals.length; i++ ) {
									var multipleBroadcastModal = _self.multipleBroadcastersModals[i];
									multipleBroadcastModal.init();
									multipleBroadcastModal.update();
					}
	};

	/**
		* NB: Also in fixtures-results. It creates a multiple broadcaster modal, where appropriate, for each fixture with
		* the corresponding information needed.
		*
		* @param {Array} dataContent - Response from API call
		*/
	app.resultsList.prototype.saveMultipleBroadcastModals = function ( dataContent ) {
					var _self = this;
					var fixtureLength = dataContent.length;
					for (var i = 0; i < fixtureLength; i ++) {
									var fixtureObject = dataContent[i];
									var fixtureId = fixtureObject.fixture.id;

									if ( fixtureObject.broadcasters.length > 1 ) {
													var liveStreams = _self.liveStreaming.getFixturesStreamingURLs(fixtureId, fixtureObject.fixture.kickoff.millis);
													var multipleBroadcastersModal = new app.multipleBroadcastersModal(fixtureObject.broadcasters, liveStreams, fixtureId);

													_self.multipleBroadcastersModals.push(multipleBroadcastersModal);
									}
					}
	};

	app.resultsList.prototype.renderBroadcastingSchedule = function( data ) {

		var _self = this;
		_self.multipleBroadcastersModals = [];
		_self.thisBroadcastingScheduleData = data;

		if ( !_self.liveStreaming ) {
			_self.liveStreaming = new app.liveStreaming(_self.element);
		}
		// We only ever get results for one country on match centre, country deduced by cloudfront, so its safe to use a dummy country code
		_self.liveStreaming.saveStreamingURLs(data.content, 'MATCH-CENTRE');
		_self.saveMultipleBroadcastModals(data.content);
		var matchATags = _self.fixtures.getElementsByTagName('div');
		for (var i = 0; i < matchATags.length; i++) {
			var matchId = matchATags[i].getAttribute("data-matchid");
			if(matchId) {
				for (var j = 0; j < _self.thisBroadcastingScheduleData.content.length; j++) {
					var broadcastingScheduleData = _self.thisBroadcastingScheduleData.content[j];

					if(broadcastingScheduleData.fixture.id == matchId && broadcastingScheduleData.broadcasters.length > 0) {
						var spanBroadcaster = matchATags[ i ].getElementsByClassName( 'broadcastDataContainer' )[0];
						var model = broadcastingScheduleData.broadcasters[0];
      var liveStreams = _self.liveStreaming.getFixturesStreamingURLs(broadcastingScheduleData.fixture.id, broadcastingScheduleData.fixture.kickoff.millis);
      model.hasLiveStream = liveStreams.length > 0;
						model.liveOnLabel = i18n.lookup( 'label.liveon' );
						model.fixtureId = matchId;
						if ( broadcastingScheduleData.broadcasters.length > 1 )
						{
							model.multipleBroadcasters = i18n.lookup( 'label.multiplebroadcasters' );
						}
						spanBroadcaster.innerHTML = Mustache.render( app.templates[ 'fixturelistbroadcaster' ], model );
						break;
					}
				}
			}
		}
		_self.initBroadcastModals();
	};

	/**
	 * Initialise model for viewing event details
	 */
	app.resultsList.prototype.initModal = function()
	{
		var _self = this;

		var modalConfig = {
			parent: _self.element,
			selector: '[data-ui-modal]',
			openClass: 'open',
			modalId: 'modalWrap',
			closeText: 'close',
			openCallback: function(modal){
				_self.updateModal( modal );
			},
			modalWrapClass : 'plModal',
			modalContentWrapClass : 'plModalContent'
		};
		_self.modal = new ui.modal( modalConfig );

	};

	/**
	 * Updated modal
	 */
	app.resultsList.prototype.updateModal = function( modal )
	{
		var _self = this;

		var match = modal.config.current.uiArgs;
		var modalElement = modal.config.current.content;
		var modalActivator = modal.config.current.activator;
		var modalHeader = modalElement.getElementsByClassName( 'fixtureModalHeader' );

		if ( modalHeader && modalHeader.length > 0 && match )
		{
			var model = getMatchModel( match, modalActivator );
			var loaderDiv = document.createElement( "div" );
			var loader = new ui.loader( loaderDiv, { init : true, loaderTemplate : app.templates.loader } );
			model.loaderHtml = loader.element.innerHTML;
			var html = Mustache.render( app.templates[ 'quickviewheader' ], model );
			modalHeader[ 0 ].innerHTML = html;

		}

		_self.getMatchHeadToHead( match, modalHeader[ 0 ] );
		_self.getMatchStandings( match, modalHeader[ 0 ] );
	};

	/**
	 * Get head to head stats details between the two teams
	 *
	 * @param {object} match Match fixture
	 * @param {HTMLelement} container Container for fixture
	 */
	app.resultsList.prototype.getMatchHeadToHead = function( match, container )
	{
		var _self = this;

		var teams = getTeamIds( match );
		if ( teams && teams.length > 0 )
		{
			var teamIds = teams.join( ',' );

			var requestConfig = {
				teams : teamIds,
				altIds : true
			}

			var subscriberObject = {
				url: app.common.createApiPath( 'stats.headtohead', requestConfig ),
				method: "GET",
				callback: _self.renderHeadToHead,
				target: this,
				container : container,
				match : match
			};

			core.data.manager.add( subscriberObject );
		}
	};

	/**
	 * Get match standings for the fixture
	 *
	 * @param {object} match Match fixture
	 * @param {HTMLelement} container Container for standings
	 */
	app.resultsList.prototype.getMatchStandings = function( match, container )
	{
		var _self = this;

		var compId = match.gameweek.compSeason.id;
		if ( compId )
		{
			var requestConfig = {
				compSeasons : compId,
				altIds : true
			}

			var subscriberObject = {
				url: app.common.createApiPath( 'standings.all', requestConfig ),
				method: "GET",
				callback: _self.renderStandings,
				target: this,
				container : container,
				match : match,
				forceCallback : true
			};

			core.data.manager.add( subscriberObject );
		}
	};

	/**
	 * Render standings for two teams in fixture
	 *
	 * @param {object} data Standings data
	 * @param {data} config Config for standings feed
	 */
	app.resultsList.prototype.renderStandings = function( data, config )
	{
		var _self = this;

		if ( config && config.container && data && data.tables && data.tables.length > 0 )
		{
			var teamStandings = getTeamStandings( config.match, data.tables );
			var thisContainer = config.container.getElementsByClassName( 'matchStandingsContainer' );
			if ( thisContainer && thisContainer.length > 0 )
			{
				thisContainer[ 0 ].innerHTML = Mustache.render( app.templates[ 'fixturemodalstandings' ], { table : teamStandings } );
			}
		}
	}

	/**
	 * Render head to head
	 *
	 * @param {object} data Head to Head data
	 * @param {data} config Config for head to head feed
	 */
	app.resultsList.prototype.renderHeadToHead = function( data, config )
	{
		var _self = this;

		if ( config && config.container && data )
		{
			if ( data.fixtures )
			{
				for ( var key in data.fixtures )
				{
					var thisContainer = config.container.getElementsByClassName( 'matchTeamForm' + key );
					if ( thisContainer && thisContainer.length > 0 && data.fixtures[ key ] )
					{
						var max = Math.min(data.fixtures[ key ].length, 5);
						var html = '';
						for ( var i = 0; i < max; i++ )
						{
							var model = getMatchModel( data.fixtures[ key ][ i ] );
							html += Mustache.render( app.templates[ 'fixturemodalmatch' ], model );
						}
						thisContainer[ 0 ].innerHTML = html;
					}
				}
			}

			if ( data.headToHeads && data.headToHeads.length > 0 )
			{
				var thisContainer = config.container.getElementsByClassName( 'matchPreviousMeetingsContainer' );

				var max = Math.min(data.headToHeads.length, 3);
				var html = '';
				for ( var i = 0; i < max; i++ )
				{
					var model = getMatchModel( data.headToHeads[ i ] );
					html += Mustache.render( app.templates[ 'fixturemodalmatch' ], model );
				}
				thisContainer[ 0 ].innerHTML = html;
			}
		}
	}

	/**
	 * delegate method of the scroll loader, called when a load of a new page
	 * is needed according to the loader
	 */
	app.resultsList.prototype.didRequestLoad = function() {
		var _self = this;

		getNextPage( _self );

	};

	app.resultsList.prototype.gotTodaysMatchesUpdate = function( data, sub ) {
		var _self = this;

		if( data && data.content && data.content.length && _self.todaysMatches ) {

			var comps = {};

			for( var h = 0; h < data.content.length; h++ ) {

				if( !comps[ data.content[ h ].gameweek.compSeason.competition.id ] ) {
					comps[ data.content[ h ].gameweek.compSeason.competition.id ] = []
				}

				comps[ data.content[ h ].gameweek.compSeason.competition.id ].push( data.content[ h ] );

			};

			_self.todaysMatches.refresh( {
				content: comps,
				matchDay: new Date().toISOString().split( 'T' )[ 0 ]
			} );
		}
	};

	/**
	 * data callback for receiving the next page
	 */
	app.resultsList.prototype.gotNextPage = function( data, sub ) {
		var _self = this;

		if( data.pageInfo ) {
			_self.pageNumber = data.pageInfo.page;
			_self.pagesTotal = data.pageInfo.numPages;
		}

		var matchesByDay = getMatchesByDay( _self, data );

		//update page params
		renderFixturesPage( _self, _self.fixtures, true, matchesByDay );
		var fixtureIds = [];
		for (var i = 0; i < data.content.length; i++) {
			fixtureIds.push(data.content[i].id);
		}
		_self.initBroadcastData( fixtureIds.join(",") );

		// tell the loader that we finished so it can replace itself
		_self.loader.completedDataLoad( _self.pageNumber >= _self.pagesTotal );
	};

	/**
	 * data callback for getting a fresh page
	 */
	app.resultsList.prototype.gotFreshPage = function( data, sub ) {
		var _self = this;

		var matchesByDay = getMatchesByDay( _self, data );
		renderFixturesPage( _self, _self.fixtures, false, matchesByDay );
		var fixtureIds = [];
		for (var i = 0; i < data.content.length; i++) {
			fixtureIds.push(data.content[i].id);
		}
		_self.initBroadcastData( fixtureIds.join(",") );

		_self.loader.reAppend();

	};

	/**
	 * delegate method that is called by the filter controller when the
	 * filter group has updated its state, this will be used to fetch new data
	 *
	 * @param {app.dropDownItemState[]} newState
	 */
	app.resultsList.prototype.filterUpdated = function( newState, init ) {
		var _self = this;

		var same = true;

		var thisConfig = getFilterStatesAsParams( _self, newState );

		if(thisConfig.comps != app.competition.FIRST) {
			_self.generateFixturesCalendar[ 0 ].style.display = "none";
		} else {
			_self.generateFixturesCalendar[ 0 ].style.display = "";
		}

		same = core.object.sameObject( _self.lastConfig, thisConfig );
		_self.lastConfig = thisConfig;

		_self.filterState = newState;
		if( !same || init ) {
			setPageLoading( _self, _self.fixtures );
			getNewPage( _self );
		}

		_self.filterInitialised = true;
	};

	var init = function(){
		// initialise on results lists
		var w = document.querySelectorAll( '[data-widget="results-filtered-list"]' );
		w = Array.prototype.map.call( w, function( widget ){

			return new app.tabAwareWidget( {
				widgetConstructor: app.resultsList,
				widgetElement: widget,
				widgetConfig: {}
			} );
		} );
	};

	app.filterGroups.setData( init );

} )( PULSE.app, PULSE.core, PULSE.ui, PULSE.app.common, PULSE.I18N );

PULSE.app.templates.expandedgraphview='<div class="expandableTeam"><a class="expandablebadge-50" href="#!"><span class="badge-25 {{optaId}}"></span></a><div class="teamInfo" href="#!"><span class="teamName">{{name}}</span> <span class="teamPitch"><span class="icn stadium"></span>Goodison Park</span></div></div><div class="teamPerformanceStandingsContainer"></div><div class="expandableFixtures"><div class="resultWidget">Latest Result - Saturday 12 September <a href="#!" class="matchAbridged"><span class="teamName">CRY</span> <span class="badge-25 CRY"></span> <span class="score">1 <span>-</span>2</span> <span class="badge-25 SOU"></span> <span class="teamName">SOU</span> <span class="icn arrow-right"></span></a></div><div class="resultWidget">Next Fixture - Saturday 12 September <a href="#!" class="matchAbridged"><span class="teamName">CRY</span> <span class="badge-25 CRY"></span> <span class="score">1 <span>-</span>2</span> <span class="badge-25 SOU"></span> <span class="teamName">SOU</span> <span class="icn arrow-right"></span></a></div><div class="btn-highlight" role="btn">Visit Club Page<span class="icn arrow-right-w"></span></div></div><table class="overallStats"><thead><tr><th>Goals Scored</th><th>Goals C/ded</th><th>Avg. Goals/M</th></tr></thead><tbody><tr><td>{{stats.gs}}</td><td>{{stats.gc}}</td><td>{{stats.ag}}</td></tr></tbody><thead><tr><th>Home Win %</th><th>Away Win %</th><th>Overall Win %</th></tr></thead><tbody><tr><td>{{stats.hw}}<span class="percentSize">%</span></td><td>{{stats.hw}}<span class="percentSize">%</span></td><td>{{stats.hw}}<span class="percentSize">%</span></td></tr></tbody></table><div class="performanceWidgetArea"><div id="curve_chart" style="width: 100%; height: 20rem"></div></div><table class="overallStatsAbridged"><thead><tr><th>Avg. Goals/M</th><th>Home Win %</th><th>Away Win %</th><th>Overall Win %</th></tr></thead><tbody><tr><td>{{stats.ag}}</td><td>{{stats.hw}}<span class="percentSize">%</span></td><td>{{stats.aw}}<span class="percentSize">%</span></td><td>{{stats.ow}}<span class="percentSize">%</span></td></tr></tbody></table>',PULSE.app.templates.expandedstats="",PULSE.app.templates.progressmatch='<div class="performanceResult"><div class="matchAbridged pre"><span class="matchInfo">{{ matchDate }}</span> <strong class="position">{{ posLabel }}: {{ position }}</strong><div class="teamContainer"><span class="teamName">{{ teams.0.team.club.abbr }}</span> <span class="badge-20 {{ teams.0.team.altIds.opta }}"></span> <span class="score">{{ teams.0.score }}<span>-</span>{{ teams.1.score }}</span> <span class="badge-20 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName">{{ teams.1.team.club.abbr }}</span></div></div></div>',PULSE.app.templates.tablerowexpanded='<td colspan="13"></td>',PULSE.app.templates.tablerows='{{#rows}} {{#upIdx}}{{/upIdx}}<tr class="{{#getRowClass}}{{/getRowClass}}" data-filtered-entry-size="{{ entrySize }}" data-filtered-table-row="{{team.id}}" data-filtered-table-row-name="{{team.name}}" data-filtered-table-row-abbr="{{team.club.abbr}}"><td class="revealMore" style="display: table-cell" tabindex="0" role="button"><div class="icn chevron-down-g"></div></td><td class="pos button-tooltip" tabindex="0" id="Tooltip" role="tooltip"><span class="value">{{#getIdx}}{{/getIdx}}</span> <span class="movement {{#getMoveClass}}{{/getMoveClass}}"><span class="tooltipContainer tooltip-left"><span class="tooltip-content">label.lastposition <span class="resultHighlight">{{startingPosition}}</span></span></span></span></td><td class="team" scope="row"><a href="{{ link }}"><span class="badge-25 {{team.altIds.opta}}"></span><span class="long">{{name}}</span> <span class="short">{{team.club.abbr}}</span></a></td><td>{{#getMetric}}played{{/getMetric}}</td><td>{{#getMetric}}won{{/getMetric}}</td><td>{{#getMetric}}drawn{{/getMetric}}</td><td>{{#getMetric}}lost{{/getMetric}}</td><td class="hideSmall">{{#getMetric}}goalsFor{{/getMetric}}</td><td class="hideSmall">{{#getMetric}}goalsAgainst{{/getMetric}}</td><td>{{#getMetric}}goalsDifference{{/getMetric}}</td><td class="points">{{#getMetric}}points{{/getMetric}}</td><td class="form hideMed"><ul>{{#teamForm}}<li tabindex="0" class="{{ outcome.class }} button-tooltip" id="Tooltip" role="tooltip">{{ outcome.short }} <a href="{{ url }}" class="tooltipContainer linkable tooltip-link tooltip-right"><span class="tooltip-content"><span class="matchAbridged"><span class="matchInfo"><span class="resultHighlight">{{ outcome.long }}</span> {{ matchDate }}</span> <span class="teamName">{{ teams.0.team.name }}</span> <span class="badge-20 {{ teams.0.team.altIds.opta }}"></span> <span class="score">{{ teams.0.score }}<span>-</span>{{ teams.1.score }}</span> <span class="badge-20 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName">{{ teams.1.team.name }}</span> <span class="icn arrow-right"></span></span></span></a></li>{{/teamForm}}</ul></td><td class="nextMatchCol hideMed">{{#nextMatch}} <span tabindex="0" class="button-tooltip" id="Tooltip" role="tooltip"><span class="nextMatch"><span class="badge-20 {{ opponentLogo }}"></span></span> <a href="{{ url }}" class="tooltipContainer linkable tooltip-link tooltip-right"><span class="tooltip-content"><div href="#!" class="matchAbridged"><span class="matchInfo">{{ matchDate }}</span> <span class="teamName">{{ teams.0.team.name }}</span> <span class="badge-20 {{ teams.0.team.altIds.opta }}"></span> <time>{{ matchTime }}</time> <span class="badge-20 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName">{{ teams.1.team.name }}</span> <span class="icn arrow-right"></span></div></span></a></span> {{/nextMatch}}</td></tr><tr class="expandable" data-filtered-table-row-expander="{{team.id}}"><td colspan="13"><div class="expandableTeam"><a class="expandablebadge-50" href="{{ link }}"><span class="badge-50 {{team.altIds.opta}}"></span></a><div class="teamInfo"><a href="{{ link }}" class="teamName">{{team.name}}</a></div></div><div class="expandableFixtures">{{#lastResult}}<div class="resultWidget"><div class="label"><strong>{{ latestResultLabel }}</strong> - {{ matchDate }}</div><a href="{{ url }}" class="matchAbridged pre"><span class="teamName">{{ teams.0.team.club.abbr }}</span> <span class="badge-20 {{ teams.0.team.altIds.opta }}"></span> <span class="score">{{ teams.0.score }}<span>-</span>{{ teams.1.score }}</span> <span class="badge-20 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName">{{ teams.1.team.club.abbr }}</span> <span class="icn arrow-right"></span></a></div>{{/lastResult}} {{#nextMatch}}<div class="resultWidget"><div class="label"><strong>{{ latestFixtureLabel }}</strong> - {{ matchDate }}</div><a href="{{ url }}" class="matchAbridged pre"><span class="teamName">{{ teams.0.team.club.abbr }}</span> <span class="badge-20 {{ teams.0.team.altIds.opta }}"></span> <time>{{ matchTime }}</time> <span class="badge-20 {{ teams.1.team.altIds.opta }}"></span> <span class="teamName">{{ teams.1.team.club.abbr }}</span> <span class="icn arrow-right"></span></a></div>{{/nextMatch}}<div class="btnContainer"><a href="{{ link }}" class="btn-highlight" role="btn">Visit Club Page<span class="icn arrow-right-w"></span></a></div></div><div class="teamPerformanceStandingsArea"><header><h3 class="subHeader left">{{performanceChartLabel}}</h3><a href="/stats/comparison" class="btn right">Compare against another team<span class="icn arrow-right"></span></a></header><div class="teamPerformanceStandingsContainer"></div></div></td></tr>{{/rows}}';
/*globals PULSE, PULSE.app */

(function( app ){
	"use strict";

	app.rangeLookup = {
		'39' : {
			'1' : {
				'range' : '38-38',
				'filter' : [ 13767, 13765, 13771 ]
			}
		},
		'33' : {
			'1' : {
				'range' : undefined,
				'filter' : [ 13298, 13299 ],
				'pageSize' : 313
			},
			'2' : {
				'range' : undefined,
				'filter' : [ 13300 ],
				'pageSize' : 313
			}
		},
		'34' : {
			'1' : {
				'range' : undefined,
				'filter' : [ 12806, 12805 ],
				'pageSize' : 313
			},
			'2' : {
				'range' : undefined,
				'filter' : [ 12807 ],
				'pageSize' : 313
			}
		},
		'36' : {
			// '0' : {
			// 	'range' : undefined,
			// 	'filter' : [ 13883, 13884, 13885, 13886, 13887, 13888, 13889, 13890, 13891, 13892, 13893, 13894, 13895, 13896, 13899, 13901 ],
			// 	'pageSize' : 49
			// },
			'0' : {
				'range' : undefined,
				'filter' : [ 13897, 13898, 13900, 13902, 13903, 13904, 13905, 13908 ],
				'pageSize' : 49
			},
			'1' : {
				'range' : undefined,
				'filter' : [ 13906, 13907, 13909, 13910 ],
				'pageSize' : 49
			},
			'2' : {
				'range' : undefined,
				'filter' : [ 13911, 13912 ],
				'pageSize' : 49
			},
			'4' : {
				'range' : undefined,
				'filter' : [ 13913, 13914 ],
				'pageSize' : 49
			}
		}
	};

}( PULSE.app ));

/*globals PULSE, PULSE.app, PULSE.I18N */

/*globals PULSE, PULSE.app, PULSE.i18N, PULSE.app.common */

( function( app, i18n, ui ) {


	/**
	 * @namespace app.quickView.public
	 */

	/**
	 * quick-view component will initialise itself, rather than initialising
	 * within a specific fix/res list, as its highly probable that there will be
	 * multiple instances of these lists, a singleton here makes sure we are not
	 * creating unnecessary instances.
	 *
	 * this single instance will also handle the creation and callbacks of the modal
	 *
	 * @param {HTMLElement} container the element in which to place the modal
	 * @param {object} config
	 */
	var quickView = function( container, config ) {
		var _self = this;

		_self.container = container;

		var qvModalEl = document.createElement( 'div' );
		qvModalEl.setAttribute( 'id', 'quickview' );

		_self.container.appendChild( qvModalEl );

		// create the modal
		_self.modal = new ui.modal({
			parent: document,
			selector: '[data-ui-modal]',
			openClass: 'open',
			modalId: 'modalWrap',
			closeText: i18n.lookup( 'label.close' ),
			openCallback: function( mdl ) {
				console.log( 'mdl open', mdl );
			},
			closeCallback: function( mdl ) {
				console.log( 'mdl close', mdl );
			}
		});

	};

	var qv;

	app.getQuickViewInstance = function() {

		if( !qv ) {
			qv = new quickView( document.querySelector( 'body' ), {} );
		}

		return qv;
	};


} )( PULSE.app, PULSE.I18N, PULSE.ui );

( function( app, i18n, core, common ) {

	/**
	 * return the state as a stripped down object
	 *
	 * @param {app.resultsList} _self contextual reference to the calling instance
	 * @param  {app.dropDownItemState[]} state state array of filter list
	 * @returns {string}m the generated url
	 */
	var getFilterStatesAsParams = function( _self, state ) {

		var simpleState = {};

		// filters should be named according to the api request
		// parameter that they represent
		for( var d = 0; d < state.length; d++ ) {

			if( state[ d ].state.id != -1 ) {
				simpleState[ state[ d ].name ] = state[ d ].state.id;
			} else if( state[ d ].name == "comps" ) {

				// selected all competition, unlike others we need to
				// narrow by these specifically
				var pString = "";
				for( var i = 0; i < state[ d ].state.list.length; i++ ) {
					pString += state[ d ].state.list[ i ].id;

					if( i < state[ d ].state.list.length -1  ) {
						pString += ",";
					}
				}
				simpleState[ state[ d ].name ] = pString;
			} else {
				simpleState[ state[ d ].name ] = false;
			}
		}

		return simpleState;
	};


	/**
	 * create a param strin form a pbject
	 *
	 * @param _self
	 * @param state
	 * @returns {string}
	 */
	var objectToUrlParams = function( _self, state ) {

		var paramName = Object.keys( state );
		var paramString = "";
		var added = 0;

		for( var x = 0; x < paramName.length; x++ ) {

			if( state[ paramName[ x ] ] !== false ) {
				var leading = added === 0 ? "?" : "&";
				paramString += ( leading + paramName[ x ] + "=" + state[ paramName[ x ] ] );
				added++
			}
		}

		return paramString;
	};


	/**
	 * the stats card shows information from the season / period and displays a graph
	 *
	 * @param {HTMLElement} element in which to initialise the view
	 * @param {object} config stats configuration
	 */
	app.tableStatsCard = function( element, config ) {
		var _self = this;

		_self.element = element;
		_self.teamId = config.teamId;
		_self.teamName = config.teamName;
		_self.teamAbbr = config.teamAbbr;
		_self.optaId = config.optaId;
		_self.extraOptions = false;
		_self.table = config.table;

		_self.subscriber = {
			method: "GET",
			callback: _self.update,
			forceCallback: true,
			target: _self
		};
	};

	/**
	 * pulsejs data managager callback for stats, indicates we are ready to render
	 *
	 * @param {object} data api response
	 * @param {object} sub pulseJS subscriver object
	 */
	app.tableStatsCard.prototype.render = function( data, sub ) {
		var _self = this;

		_self.element.innerHTML = Mustache.render( app.templates.tablerowexpanded, {});

	};

	/**
	 * pulsejs datamanger callback for standings
	 *
	 * @param {object} data api response
	 * @param {object} sub pulseJS subscriver object
	 */
	app.tableStatsCard.prototype.gotStandings = function( data, sub ) {
		var _self = this;

		if( data ) {

			_self.standings = data;

			core.data.manager.add( _self.statsSubscriber );
		}

	};

	/**
	 * get stats and collect the ones we want
	 *
	 * @param {object} data api response
	 * @param {object} sub pulseJS subscriver object
	 */
	app.tableStatsCard.prototype.gotStats = function( data, sub ) {
		var _self = this;

		if( data && data.content ) {


			/**
			 *
			 * gs - goals scored
			 * gc - goals conceeded
			 * ag - average goals / match
			 * hw - home wins
			 * aw - aways wins
			 * ow - overall wins
			 */
			var madeStats = {};

			data.content.map( function( stat ) {

				switch( stat.name ) {
					case "goals":
						madeStats[ 'gs' ] = stat.value;
						break;
					case "goals_conceded":
						madeStats[ 'gc' ] = stat.value;
						break;
				}

			} );

			_self.element.innerHTML = "";
			core.dom.appendDomString( _self.element, Mustache.render( app.templates.expandedgraphview, {
				stats: madeStats,
				standings: _self.standings,
				name: _self.teamName,
				abbr: _self.teamAbbr,
				optaId: _self.optaId
			} ), true );

		}

	};

	/**
	 * prepare to show the container, initiate loading and
	 * indicate that the data is on the way, provide the extra api
	 * params as extraOptions
	 *
	 * @param {PULSE.app.dropDownItemState} extraOptions
	 */
	app.tableStatsCard.prototype.prepareToShow = function( extraOptions ) {
		var _self = this;

		_self.extraOptions = extraOptions;

		var params = getFilterStatesAsParams( _self, _self.extraOptions );
		params.teams = _self.teamId;

		_self.standingsSubscriber = {
			url: common.createApiPath( 'standings.all', objectToUrlParams( _self, params ) ),
			method: "GET",
			callback: _self.gotStandings,
			forceCallback: true,
			target: _self
		};

		core.data.manager.add( _self.standingsSubscriber );

	};


} )( PULSE.app, PULSE.I18N, PULSE.core, PULSE.app.common );

( function( app, common, core, i18n, ui ) {


	/**
	 * initiate showing the card
	 *
	 * @param {PULSE.app.filteredCompTableRow } _self context ref to calling instance
	 */
	var showStatsCard = function( _self ) {

		if( _self.element.classList.toggle( 'expanded' ) ) {
			//was added, user has requested dropdown to open
			_self.statsCard.prepareToShow( _self.tableDelegate.filterController.getState() );
		}

	};
	/**
	 * represents a table row, responsible for drawing template from data and
	 * can render itself into a container, or attach to an already existing div
	 * is also responsible for managing stats card
	 *
	 * @param {PULSE.app.filteredTable} tableDelegate table which is responsible for creating this row
	 * @param {HTMLElement} element an element that is already in the dom to initiate on
	 * @param {HTMLElement} container instead of an element provide a container that the item should append itself to
	 * @param {object} matchData initialise from data and render yourself
	 */
	app.filteredCompTableRow = function( tableDelegate, element, container )
	{
		var _self = this;

		_self.teamId = false;
		_self.element = false;
		_self.matchData = false;
		_self.statsCard = false;
		_self.tableDelegate = tableDelegate;
		_self.tableContainer = _self.tableDelegate.table;
		_self.container = container;

		if( element ) {
			//init from html element
			_self.element = element;
			_self.teamId = _self.element.getAttribute( 'data-filtered-table-row' );
			_self.maxSize = _self.element.getAttribute( 'data-filtered-entry-size' );
			_self.compSeason = _self.element.getAttribute( 'data-compseason' );
			_self.setListeners( _self );
		}
	};

	app.filteredCompTableRow.prototype.setListeners = function()
	{
		var _self = this;

		['keypress', 'click'].forEach(function(eventType){
			var revealMore = _self.element.querySelector( '.revealMore' );
			if(revealMore) {
				_self.element.querySelector( '.revealMore' ).addEventListener(eventType, function( evt ) {
					if (evt.which === 13 || evt.type === 'click') {

						core.style.toggleClass( _self.element, 'expanded' );
						var expander = _self.container.querySelectorAll( '[data-filtered-table-row-expander="' + _self.teamId + '"]' );
						if ( expander && expander.length > 0 && window.googleInit && core.style.hasClass( _self.element, 'expanded' ) )
						{
							var teamPerform = expander[ 0 ].getElementsByClassName( 'teamPerformanceStandingsContainer' );
							if ( teamPerform && teamPerform.length > 0 )
							{
								//var loader = new ui.loader( teamPerform[ 0 ], { init : true } );
								_self.getProgress( teamPerform[ 0 ] );
							}
						}
					}
				});
			}
		});
	};

	app.filteredCompTableRow.prototype.getProgress = function( container )
	{
		var _self = this;

		var requestConfig = {
			id : _self.compSeason,
			tid : _self.teamId,
			altIds : true
		};

		var subscriberObject = {
			url : common.createApiPath( 'competition-season.standings.team', requestConfig ),
			method: "GET",
			callback: _self.renderProgress,
			target: this,
			container : container
		};
		core.data.manager.add( subscriberObject );
	};


	app.filteredCompTableRow.prototype.renderProgress = function( data, config )
	{
		var _self = this;

		if ( data && config && data.entries && data.entries.length > 0 && data.team )
		{
			config.container.parentNode.style.display = '';
			var name = ( data.team && data.team.club && data.team.club.abbr ) ? data.team.club.abbr : data.team.shortName;
			var progressArray = [];
			var entryArray = [];
			data.entries.forEach( function( entry, index )
			{
				var thisArray = [ entry.played + "", entry.position ];
				var html = '';
				var fillColour = '#76766f';
				if ( entry.fixtures && entry.fixtures.length > 0 && data.team.id )
				{
					entry.fixtures.forEach( function( fixture )
					{
						var model = _self.tableDelegate.generateMatchModel( fixture, data.team.id );
						model.position = entry.position;
						model.posLabel = i18n.lookup( 'label.short.position' );
						if ( model.outcome.type === 'W' )
						{
							fillColour = '#13cf00';
						}
						else if ( model.outcome.type === 'L' )
						{
							fillColour = '#D81920';
						}
						html +=  Mustache.render( app.templates[ 'progressmatch' ], model );
					} );
					thisArray.push( html );
					thisArray.push( 'point { fill-color: ' + fillColour +'; stroke-width: 2;  stroke-color: white; }' );
					progressArray.push( thisArray );
					entryArray.push( entry );
				}
			} );

			var arrayData = new google.visualization.DataTable();
			arrayData.addColumn( 'string', 'Year');
			arrayData.addColumn( 'number', name);
			arrayData.addColumn( {type: 'string', role: 'tooltip', p: {html:true}} );
			arrayData.addColumn( {'type': 'string', 'role': 'style'} );
			arrayData.addRows( progressArray );

			var ticks = [ 1 ];
			for ( var i = 1; i < parseInt( _self.maxSize ) + 1; i++ )
			{
				if ( i % 5 === 0 )
				{
					ticks.push( i );
				}
			}

			var options = {
			  colors: ['#ccc'],
			  height: 300,
			  legend : 'none',
			  pointSize: 10,
			  tooltip: {
			  	isHtml: true
			  },
			  fontSize: 12,
			  fontName: 'PremierSans-Regular',
			  chartArea:{
			  	left: 80,
			  	top: 20,
			  	right: 10
			  },
			  vAxis: {
			  	title: i18n.lookup( 'label.position' ),
			  	titleTextStyle: {
			  		color: '#61605c',
			  		fontSize: '1.1rem',
			  		italic: false,
					  fontName: 'PremierSans-Bold',
			  	},
			  	direction: -1,
			  	format: '0',
			  	viewWindow: {
			        min: 1,
			        max: _self.maxSize
			    },
			    ticks: ticks,
			  	gridlines: {
			  		color: '#eee'
			  	}
			  },
			  hAxis : {
			  	title: i18n.lookup( 'label.matchesplayed' ),
			  	titleTextStyle: {
			  		color: '#61605c',
			  		fontSize: '1.1rem',
			  		italic: false,
					  fontName: 'PremierSans-Bold',
			  	}
			  }
			};

			var chart = new google.visualization.AreaChart( config.container );

			google.visualization.events.addListener(chart, 'select', function() {
	          // grab a few details before redirecting
	          var selection = chart.getSelection();
	          var row = selection[0].row;
	          if ( entryArray && entryArray[ row ] && entryArray[ row ].fixtures && entryArray[ row ].fixtures.length > 0 )
	          {
	          	window.location.href = common.generateContentUrl( 'match', entryArray[ row ].fixtures[ 0 ].id );
	          }
	        });

			chart.draw( arrayData, options );

			function resizeChart () {
			    chart.draw(arrayData, options);
			}
			if (document.addEventListener) {
			    window.addEventListener('resize', resizeChart);
			}
			else if (document.attachEvent) {
			    window.attachEvent('onresize', resizeChart);
			}
			else {
			    window.resize = resizeChart;
			}
		}

	};



} )( PULSE.app, PULSE.app.common, PULSE.core, PULSE.I18N, PULSE.ui );


( function( app, core, common, i18n, ui ) {


	var initialiseMatchItems = function( _self ) {

		var entries = _self.element.querySelectorAll( '[data-filtered-table-row]' );

		Array.prototype.map.call( entries, function( entry ) {
			new app.filteredCompTableRow( _self, entry, _self.element );
		} );

	};

	var comparisons = {

		"mapping" : {
			"H" : "home",
			"A": "away",
			"O": "overall"
		},
		"H" : function( a, b ) {

			var ahp = a.home.points;
			var bhp = b.home.points;

			if( ahp === bhp ) {

				var agd = a.home.goalsDifference;
				var bgd = b.home.goalsDifference;

				return agd === bgd ? 0 : agd > bgd ? 1 : -1;
			}

			return ahp > bhp ? 1 :  -1;

		},
		"A" : function( a, b ) {

			var ahp = a.away.points;
			var bhp = b.away.points;

			if( ahp === bhp ) {

				var agd = a.away.goalsDifference;
				var bgd = b.away.goalsDifference;

				return agd === bgd ? 0 : agd > bgd ? 1 : -1;
			}

			return ahp > bhp ? 1 :  -1;

		},
		"O" : function( a, b ) {

			return a.position < b.position ? 1 :  -1;

		}
	};

	var getRoundForComp = function( tableData, table, structure )
	{
		if ( tableData && tableData.compSeason && tableData.compSeason.id && structure && structure[ tableData.compSeason.id ] )
		{
			var thisStructure = structure[ tableData.compSeason.id ].structure;
			if ( thisStructure )
			{
				for ( var i = 0; i < thisStructure.length; i++ )
				{
					if ( thisStructure[ i ].type === 'L' && thisStructure[ i ].groups && thisStructure[ i ].groups.length > 0 && table.groupName )
					{
						for ( var j = 0; j < thisStructure[ i ].groups.length; j++ )
						{
							if ( table.groupId && table.groupId === thisStructure[ i ].groups[ j ] )
							{
								return thisStructure[ i ];
							}
							else if ( table.groupName === thisStructure[ i ].groups[ j ] )
							{
								return thisStructure[ i ];
							}
						}
					}
				}
			}
		}
	};

	var checkRenderTable = function( tableData, table, structure )
	{
		if ( tableData && tableData.compSeason && tableData.compSeason.id && structure && structure[ tableData.compSeason.id ] )
		{
			var thisStructure = structure[ tableData.compSeason.id ].structure;
			if ( thisStructure && thisStructure.length === 1 && thisStructure[ 0 ].type === 'L' )
			{
				return true;
			}
			var round = getRoundForComp( tableData, table, structure );
			if ( round )
			{
				return true;
			}
		}
		return false;
	};

	var getPointsDeducted = function( entries )
	{
		var deducted = [];
		if ( entries && entries.length > 0 )
		{
			entries.forEach( function( entry )
			{
				if ( entry.annotations && entry.annotations.length > 0 )
				{
					entry.annotations.forEach( function( annotation )
					{
						if ( annotation.type === 'PD' )
						{
							var team = ( entry.team.shortName ) ? entry.team.shortName : entry.team.name;
							var deductedMessage = '*' + team + ' - ' + annotation.description;
							deducted.push( { 'message' : deductedMessage, 'team' : team } );
						}
					} );
				}
			} );
		}
		return deducted;
	};

    var hasForm = function(entries) {
        var form = false;
        for (var i = 0; i < entries.length; i++) {
            if (entries[i].teamForm.length) {
                form = true;
                break;
            }
        }
        return form;
    };

    var hasNextMatch = function(entries) {
        var match = false;
        for (var i = 0; i < entries.length; i++) {
            if (entries[i].nextMatch) {
                match = true;
                break;
            }
        }
        return match;
    };

	var drawTable = function( _self, tableData, homeAway ) {

		var html = '';
		var isPL = app.competition.FIRST === tableData.compSeason.competition.id;

		tableData.tables.forEach( function( table, index )
		{
			var renderTable = checkRenderTable( tableData, table, _self.structureCache );

			if ( renderTable )
			{
				if( !homeAway ){
					homeAway = "O";
				}
				core.common.quicksort( table.entries, 0, table.entries.length - 1, comparisons[ homeAway ]);

				var idx = 0;

				var renderLink = true;
				if ( tableData.compSeason && tableData.compSeason.competition && tableData.compSeason.competition.id )
				{
					var compId = tableData.compSeason.competition.id;
					if ( compId === 2 || compId === 3 || compId === 10 || compId === 6 || compId === 7 )
					{
						renderLink = false;
					}
				}

				table.entries.map( function( entry )
				{
					entry.name = ( entry.team && entry.team.club && entry.team.club.name ) ? entry.team.club.name : entry.team.name;
					var id = ( entry.team && entry.team.club && entry.team.club ) ? entry.team.club.id : entry.team.id;
					if ( renderLink )
					{
						entry.link = common.generateContentUrl( 'club', id, entry.name.replace(new RegExp(' ', 'g'), '-') );
					}
					entry.renderLink = renderLink;
					entry.teamForm = [];
					if ( entry.form && entry.form.length > 0 )
					{
						for ( var i = 0; i < entry.form.length; i++ )
						{
							entry.teamForm.push( _self.generateMatchModel( entry.form[ i ], entry.team.id ) );
						}
						entry.lastResult = entry.teamForm[ entry.teamForm.length - 1 ];
					}
					if ( entry.next )
					{
						entry.nextMatch = _self.generateMatchModel( entry.next, entry.team.id );
					}

				} );

				var groupName;
				if ( table.groupId && table.groupName )
				{
					groupName = table.groupName;
				}
				else if ( tableData.compSeason && table.groupName )
				{
					groupName = i18n.lookup( 'label.competition.' + tableData.compSeason.competition.id + '.group.' + table.groupName.replace(/\s/g, '') );
				}

				var round = getRoundForComp( tableData, table, _self.structureCache );
				var roundId = undefined;
				if ( round )
				{
					roundId = round.id
				}

                var pointsDeducted = getPointsDeducted( table.entries );
                var hasTeamForm = hasForm( table.entries );
				var hasNextMatches = hasNextMatch( table.entries );


				html += Mustache.render( app.templates.filtertable, {
					rows: table.entries,
					isPL : isPL,
					groupName : groupName,
					roundId : roundId,
					compSeason : tableData.compSeason.id,
					lastPositionLabel : i18n.lookup( 'label.lastposition' ),
					latestResultLabel : i18n.lookup( 'label.latestresult' ),
					latestFixtureLabel : i18n.lookup( 'label.latestfixture' ),
					tableSummaryLabel : i18n.lookup( 'label.tableSummary' ),
                    moreLabel : i18n.lookup( 'label.more' ),
                    hasForms : hasTeamForm,
					hasNextMatches : hasNextMatches,
					positionLabel : {
						long : i18n.lookup( 'label.position' ),
						short : i18n.lookup( 'label.short.position' )
					},
					clubLabel : i18n.lookup( 'label.club' ),
					playedLabel : {
						long : i18n.lookup( 'label.played' ),
						short : i18n.lookup( 'label.short.played' )
					},
					wonLabel : {
						long : i18n.lookup( 'label.won' ),
						short : i18n.lookup( 'label.short.won' )
					},
					drewLabel : {
						long : i18n.lookup( 'label.drew' ),
						short : i18n.lookup( 'label.short.drew' )
					},
					lostLabel : {
						long : i18n.lookup( 'label.lost' ),
						short : i18n.lookup( 'label.short.lost' )
					},
					pointsLabel : {
						long : i18n.lookup( 'label.points' ),
						short : i18n.lookup( 'label.short.points' )
					},
					goalsForLabel : {
						long : i18n.lookup( 'label.long.goalsfor' ),
						short : i18n.lookup( 'label.goalsfor' )
					},
					goalsAgainstLabel : {
						long : i18n.lookup( 'label.long.goalsagainst' ),
						short : i18n.lookup( 'label.goalsagainst' )
					},
					goalDifferenceLabel : {
						long : i18n.lookup( 'label.long.goaldifference' ),
						short : i18n.lookup( 'label.goaldifference' )
					},
					nextLabel : i18n.lookup( 'label.next' ),
					formLabel : i18n.lookup( 'label.form' ),
					entrySize : table.entries.length,
					pointsDeducted : pointsDeducted,
					getMetric: function() {
						return function( text, render ) {

							return this[ comparisons.mapping[ homeAway ] ][ render( text ) ];
						}
					},
					upIdx: function() {
						return function( text, render ) {
							++idx;
							return "";
						}
					},
					getIdx: function() {

						return function( text, render ) {
							return idx;
						};
					},
					getMoveClass: function() {
						return function( text, render ) {
							if( this.position > this.startingPosition ) {
								return "down";
							}

							if( this.position < this.startingPosition ) {
								return "up";
							}
							return "none";
						}
					},
					getRowClass: function() {
						return function( text, render ) {
							return common.getTableRowClass( this );
						}
					}
				} );
			}
		});
		if ( _self.allTablesContainer && _self.allTablesContainer.length )
		{
			_self.allTablesContainer[ 0 ].innerHTML = html;
		}
		initialiseMatchItems( _self );
		addToRound( _self );
		showMoreBtns( _self );

	};

	var addToRound = function( _self )
	{
		_self.tableContainer = _self.element.getElementsByClassName( 'tableContainer' );
		_self.roundContainer = _self.element.getElementsByClassName( 'roundContainer' );
		if ( _self.tableContainer.length > 0 && _self.roundContainer.length > 0 )
		{
			Array.prototype.map.call( _self.roundContainer, function( round )
			{
				var roundId = round.getAttribute( 'data-id' );
				Array.prototype.map.call( _self.tableContainer, function( table )
				{
					var tableRound = table.getAttribute( 'data-round' );
					if ( tableRound == roundId )
					{
						round.appendChild( table );
					}
				} );
			} );
		}

		if ( _self.roundsContainer && _self.roundsContainer.length > 0 )
		{
			_self.roundsContainer[ 0 ].innerHTML = '';
		}
		if ( _self.roundContainer.length > 0 )
		{
			_self.renderRoundTabs();
		}
	};

	var showMoreBtns = function( _self ){
		//we have js enabled, so lets show the more info buttons in the
		//ui, which have been hidden using display:none

		var revealMore = _self.element.querySelectorAll( '.revealMoreHeader' );

		if( revealMore.length > -1 ) {
			Array.prototype.map.call( revealMore, function( more ) {
				more.style.display = "table-cell";
			});
		}
	};

	var getMatchMap = function( _self, matches, filter )
	{
		var map = {};
		var dateOrder = [];
		var shortDate;

		if ( matches && matches.length )
		{
			matches.forEach( function( match )
			{
				if ( match && match.kickoff && match.kickoff.millis )
				{
					if ( !filter || filter.indexOf( match.id ) > -1 )
					{
						var date = moment( match.kickoff.millis ).locale( app.language ).format( 'dddd D MMMM YYYY' );
						shortDate = moment( match.kickoff.millis ).locale( app.language ).format( 'ddd D MMM YYYY' );
						var model = _self.generateMatchModel( match );
						if ( !map[ date ] || !map[ date ].matches )
						{
							dateOrder.push( date );
							map[ date ] = { shortDate : shortDate, matches : [ model ] };
						}
						else
						{
							map[ date ].matches.push( model );
						}
					}
				}
			} );
		}
		return { map : map, dateOrder : dateOrder };
	};

	/**
	 *
	 * @param element
	 * @param config
	 */
	app.filteredTable = function( element, config ) {
		var _self = this;

		_self.element = element;

		showMoreBtns( _self );

		_self.allTablesContainer = _self.element.getElementsByClassName( "allTablesContainer" );
		_self.tableLogo = _self.element.getElementsByClassName( "tableLogo" )[0];
		_self.allStructureContainer = _self.element.getElementsByClassName( 'allStructureContainer' );
		_self.roundsContainer = _self.element.getElementsByClassName( 'roundsContainer' );

		_self.tableCompetitionExplainedContainer = _self.element.getElementsByClassName( 'tableCompetitionExplainedContainer' );

		Array.prototype.map.call( _self.element.querySelectorAll( '.revealMore' ), function( more ) {
			more.style.display = "table-cell";
		});

		_self.delegate = config.delegate || false;
		_self.filterListConfig = _self.element.getAttribute( 'data-filter-list' );
		_self.compSeason = _self.element.getAttribute( 'data-compseason');
		_self.detail = _self.element.getAttribute( 'data-detail' ) || 2;

		_self.live = _self.element.getAttribute( 'data-live' );

		_self.structureCache = {};

		_self.filterElement = _self.element.querySelector( '[data-widget="table-filter"]' );
		_self.filterController = new app.common.listFilterController( _self.filterElement , {
			dropdowns : app.filterGroups.Tables[ _self.filterListConfig ],
			delegate : _self
		} );

		_self.urlConfig = { compSeasons : parseInt( _self.compSeason ),
							altIds : true,
							detail : parseInt( _self.detail ),
							FOOTBALL_COMPETITION : _self.element.getAttribute( 'data-comps' ) || PULSE.app.filterData.comps.primary[ _self.filterListConfig ].id
							};

		_self.subscriber = {
			method: "GET",
			callback: _self.renderTable,
			forceCallback: true,
			target: _self
		};

		if ( !window.googleInit && !window.googleCalled )
		{
			window.googleCalled = true;
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback( function()
			{
				window.googleInit = true;
			} );
		}

		addToRound( _self );

		initialiseMatchItems( _self );

		if ( _self.shouldBeLive( _self.urlConfig.compSeasons ) )
		{
			_self.getCompStructure( _self.urlConfig.compSeasons );
		}
	};

	//implement the filter controller delegate prototype
	app.filteredTable.prototype = Object.create( app.common.filterControllerDelegate.prototype );

	app.filteredTable.prototype.filterUpdated = function( states, init ) {
		var _self = this;

		_self.states = states;
		//prevent update events before init
		if( _self.filterController ) {

			var original = {};
			var oriHome = _self.homeaway;
			for ( var key in _self.urlConfig ) {
				original[ key ] = _self.urlConfig[ key ];
			}
			_self.states.map( function( state )
			{
				if ( state.name === 'FOOTBALL_COMPETITION' )
				{
					if ( state.state.index == 0 )
					{
						_self.urlConfig.detail = 2;
					}
					else
					{
						_self.urlConfig.detail = 1;
					}
				}

				if ( state.name != 'homeaway' )
				{
					if ( state.state.id > -1 || state.state.id != "-1" )
					{
						_self.urlConfig[ state.name ] = state.state.id;
					}
					else
					{
						delete _self.urlConfig[ state.name ];
					}
				}
				else
				{
					_self.homeaway = state.state.id != -1 ? state.state.id : "O";
				}
			} );

			var same = core.object.sameObject( _self.urlConfig, original );

			var differentHome = false;
			if ( oriHome != _self.homeaway && ( oriHome != undefined ) )
			{
				differentHome = true;
			}

			if( init && same ) {
				_self.getCompetitionExplained( _self.urlConfig.compSeasons );
				return;
			}

			if ( !same || ( differentHome && !_self.lastData ) )
			{
				_self.getCompStructure( _self.urlConfig.compSeasons );
				_self.getCompetitionExplained( _self.urlConfig.compSeasons );
			}
			else if ( differentHome && _self.lastData != null )
			{
				_self.renderTable( _self.lastData );
			}
		}
	};

	app.filteredTable.prototype.getCompetitionExplained = function( season )
	{
		var _self = this;

		var requestConfig = {
			page : 0,
			pageSize : 1,
			references : 'FOOTBALL_COMPSEASON:' + season,
			tagNames: 'Competition Explained'
		};

		var subscriber = {
			url : app.common.createContentPath( 'promo', requestConfig ),
			method: "GET",
			callback: _self.renderCompetitionExplained,
			forceCallback : true,
			target: this,
		};

		core.data.manager.add( subscriber );
	};

	app.filteredTable.prototype.renderCompetitionExplained = function( data, config )
	{
		var _self = this;

		if ( _self.tableCompetitionExplainedContainer && _self.tableCompetitionExplainedContainer.length > 0 )
		{
			var html = '';
			if ( data && data.content && data.content.length > 0 && data.content[ 0 ] )
			{
				var promo = data.content[ 0 ];
				var model = {};
				model.url = ( promo.promoUrl ) ? promo.promoUrl : '';
				model.promoLabel = i18n.lookup( 'label.competitionexplained' );
				html = Mustache.render( app.templates.tablecompexplained, model );
			}
			_self.tableCompetitionExplainedContainer[ 0 ].innerHTML = html;
		}
	};

	app.filteredTable.prototype.getCompStructure = function( id )
	{
		var _self = this;

		if ( !_self.structureCache[ id ] )
		{
			var config = { id : id };

			var subscriber = {
				url : app.common.createApiPath( 'competition-season.structure', config ),
				method: "GET",
				callback: _self.checkStructure,
				forceCallback: true,
				target: _self
			};
			core.data.manager.add( subscriber );
		}
		else {
			_self.renderRoundContainers( id );
			_self.getNewStandings();
		}
	};

	app.filteredTable.prototype.checkStructure = function( data ) {
		var _self = this;
		if ( _self.urlConfig.compSeasons == app.newSeason.FIRST ) {
			data = app.newSeasonStructure;
		}
		_self.structureCache[ data.compSeason.id ] = data;
		_self.renderRoundContainers( data.compSeason.id );
		_self.getNewStandings();
	};

	app.filteredTable.prototype.renderRoundContainers = function( id )
	{
		var _self = this;

		var thisStructure = _self.structureCache[ id ];

		var html = '';
		if ( thisStructure && thisStructure.structure && thisStructure.structure.length > 1 )
		{
			var compId = thisStructure.compSeason.competition.id;

			thisStructure.structure.sort( function( a, b )
			{
				if ( a.id > b.id )
				{
					return 1;
				}
				else if ( b.id > a.id )
				{
					return -1;
				}
			} );

			//The data provided by Opta is not what is requested as a label, so we have to do some logic on updating these
			var isPL2CUP = thisStructure.compSeason.competition.description === 'Premier League Cup' || compId === 9;

			thisStructure.structure.forEach( function( round, index )
			{

                round.tabLabel = i18n.lookup( 'label.competition.' + compId + '.round.' + round. id );
				if ( round.label ) {
					round.tabLabel = round.label;
				} else if ( index === 0 ) {
					round.tabLabel = i18n.lookup( 'label.groupstage' );
				} else if ( index === thisStructure.structure.length - 1 ) {
					round.tabLabel = i18n.lookup( 'label.finalstage' );
				}

				//Update labels to what they are desired to be
				if ( isPL2CUP ) {
					if ( round.tabLabel === 'Qualifier Round' ) {
            			round.tabLabel = 'Qualifying Round';
					} else if ( round.groups && round.type === 'L' ) { //Final Stage
						round.tabLabel = 'Group Stage';
					}

				}
				round.rangeString = round.gameweekRange.join( '-' );
			} );

			thisStructure.roundCompSeason = thisStructure.compSeason.id;

			html = Mustache.render( app.templates.tablerounds, thisStructure );
		}
		if ( _self.allStructureContainer && _self.allStructureContainer.length )
		{
			_self.allStructureContainer[ 0 ].innerHTML = html;
		}
	};

	app.filteredTable.prototype.shouldBeLive = function( compSeason )
	{
		var _self = this;

		if ( _self.live && compSeason && app.filterData && app.filterData.comps && app.filterData.comps.primary && app.filterData.comps.primary[ _self.filterListConfig ] )
		{
			if ( app.filterData.comps.primary[ _self.filterListConfig ].compSeasons && app.filterData.comps.primary[ _self.filterListConfig ].compSeasons.length > 0 )
			{
				var currentComp = app.filterData.comps.primary[ _self.filterListConfig ].compSeasons[ 0 ];
				if ( currentComp.id === parseInt( compSeason ) )
				{
					return true;
				}
			}
		}
		return false;
	};

	app.filteredTable.prototype.getNewStandings = function()
	{
		var _self = this;

		var getLive = _self.shouldBeLive( _self.urlConfig.compSeasons );

		_self.urlConfig.live = ( getLive ) ? true : undefined;
		_self.subscriber.interval = ( getLive ) ? 10000 : undefined;
		_self.subscriber.compSeason = _self.urlConfig.compSeasons;

		_self.subscriber.url = common.createApiPath( 'standings.all', _self.urlConfig );//"https://api.test.platform.pulselive.com/football/standings" + objectToUrlParams( _self, _self.states );

		if ( _self.standingsFeed )
		{
			_self.standingsFeed.stop();
		}
		_self.standingsFeed = core.data.manager.add( _self.subscriber );
	};

	app.filteredTable.prototype.renderRoundTabs = function()
	{
		var _self = this;

		var defaultIndex = 0;

		for ( var i = 0; i < _self.roundContainer.length; i++ )
		{
			if ( _self.roundContainer[ i ].getAttribute( 'data-current' ) )
			{
				defaultIndex = i;
				break;
			}
		}

		var tabConfig = {
			tabItems: _self.roundContainer,
			tabLinkWrap: _self.element.querySelector( '.roundsContainer' ),
			builtClass: 'mcTabs',
			defaultIndex : defaultIndex,
			disableClass : 'btn-tab-disabled',
			tabCallback: function( tab )
			{
				_self.initRoundTab( tab );
			},
			buildCallback : function( tab )
			{
				_self.initRoundTab( tab );
			}
		};

		_self.statTabs = new ui.tab( tabConfig );
	};

	app.filteredTable.prototype.initRoundTab = function( tab )
	{
		var _self = this;

		var thisTab = tab.config.current.content;

		var thisType = thisTab.getAttribute( 'data-type' );
		if ( thisType === 'K' )
		{
			_self.getFixturesForKnockout( thisTab, tab.config.current.index );
		}
	};

	app.filteredTable.prototype.getFixturesForKnockout = function( container, index )
	{
		var _self = this;

		var id = container.getAttribute( 'data-season-id' );
		var range = container.getAttribute( 'data-range' );
		var filter = undefined;
		var pageSize = 100;

		var loader = new ui.loader( container, { init : true, loaderTemplate : app.templates.loader } );

		var config = {
			compSeasons : id,
			gameweekNumbers : range,
			pageSize : pageSize,
			altIds : true
		};

		var subscriber = {
			url : app.common.createApiPath( 'fixtures.all', config ),
			method: "GET",
			callback: _self.renderFixtures,
			forceCallback: true,
			target: _self,
			container : container,
			filter : filter
		};
		core.data.manager.add( subscriber );
	};

	app.filteredTable.prototype.renderFixtures = function( data, config )
	{
		var _self = this;

		_self.compId = ( _self.states && _self.states.length > 0 ) ? _self.states[0].state.id : undefined;
		if ( data && data.content && config && config.container )
		{
			var html = '';
			if ( data.content.length > 0 )
			{
				var map = getMatchMap( _self, data.content, config.filter );
				map.dateOrder.forEach( function( date )
				{
					if ( map.map && map.map[ date ] && map.map[ date ].matches )
					{
						var model = {
							date : date,
							matches : map.map[ date ].matches
						};
						html += Mustache.render( app.templates[ 'knockoutmatch' ], model );
					}
				} );
			}
			if ( config.appendFixtures )
			{
				config.container.innerHTML += html
			}
			else
			{
				config.container.innerHTML = html;
			}
		}
	};

	app.filteredTable.prototype.generateMatchModel = function( formMatch, teamId )
	{
		var _self = this;
		var model = {};

		var thisTeamScore, oppScore, opponent;
		if ( formMatch.teams[ 0 ].team.id === teamId )
		{
			thisTeamScore = formMatch.teams[ 0 ].score;
			model.homeName = formMatch.teams[ 1 ].team.shortName ? formMatch.teams[ 1 ].team.shortName : formMatch.teams[ 1 ].team.name;
			model.awayName = formMatch.teams[ 0 ].team.shortName ? formMatch.teams[ 0 ].team.shortName : formMatch.teams[ 0].team.name;
			oppScore = formMatch.teams[ 1 ].score;
			opponent = formMatch.teams[ 1 ];
		}
		else
		{
			thisTeamScore = formMatch.teams[ 1 ].score;
			model.homeName = formMatch.teams[ 0 ].team.shortName ? formMatch.teams[ 0 ].team.shortName : formMatch.teams[ 0 ].team.name;
			model.awayName = formMatch.teams[ 1 ].team.shortName ? formMatch.teams[ 1 ].team.shortName : formMatch.teams[ 1].team.name;
			oppScore = formMatch.teams[ 0 ].score;
			opponent = formMatch.teams[ 0 ];
		}
		model.opponentLogo = ( opponent.team.altIds && opponent.team.altIds.opta ) ? opponent.team.altIds.opta : '';
		var outcome = 'drew';
		var outcomeClass = 'draw';
		var outcomeType = 'D';
		if ( thisTeamScore > oppScore )
		{
			outcome = 'won';
			outcomeClass = 'win';
			outcomeType = 'W';
		}
		else if ( thisTeamScore < oppScore )
		{
			outcome = 'lost';
			outcomeClass = 'lose';
			outcomeType = 'L';
		}
		model.outcome = {
			long : i18n.lookup( 'label.' + outcome ),
			short : i18n.lookup( 'label.short.' + outcome ),
			class : outcomeClass,
			type : outcomeType
		};
		if ( formMatch.status === 'C' )
		{
			model.isResult = true;
		}
		else
		{
			model.isFixture = true;
		}
		if ( formMatch.ground && formMatch.ground.city )
		{
			model.groundText = formMatch.ground.name + ", " + formMatch.ground.city;
		}
		else if ( formMatch.ground && formMatch.ground.name )
		{
			formMatch.groundText = formMatch.ground.name;
		}
		model.teams = formMatch.teams;
		if ( formMatch.kickoff && formMatch.kickoff.millis )
		{
			var koDate = new Date( formMatch.kickoff.millis );
			model.matchDate = moment( koDate ).locale( app.language ).format( 'dddd D MMMM YYYY' );
			model.matchTime = moment( koDate ).locale( app.language ).format( 'HH:mm' );
		}
		else
		{
			model.matchDate = i18n.lookup( 'label.tbc.date' );
			model.matchTime = i18n.lookup( 'label.tbc' );
		}
		model.url = common.generateContentUrl( 'match', formMatch.id );

		return model;
	};

	app.filteredTable.prototype.renderTable = function( data, sub ) {
		var _self = this;
		_self.lastData = data;

		if ( data && data.compSeason )
		{
			// Update competition logo
			if(data.compSeason.competition.id) {
				_self.tableLogo.removeChild(_self.tableLogo.childNodes[0]);
				var competitionImageElement = document.createElement( 'div' );
				core.style.addClass( competitionImageElement , "competitionImage" + data.compSeason.competition.id  );
				_self.tableLogo.appendChild(competitionImageElement);
				_self.tableLogo.style.display = '';
			}
		}
		else
		{
			_self.tableLogo.style.display = 'none';
		}

		if( data && data.tables && data.tables.length > 0  ) {
			drawTable( _self, data, _self.homeaway );
		}
		else if ( _self.allTablesContainer && _self.allTablesContainer.length > 0 )
		{
				var roundId = '';
				if ( sub && sub.compSeason && _self.structureCache && _self.structureCache[ sub.compSeason ] && _self.structureCache[ sub.compSeason ].structure && _self.structureCache[ sub.compSeason ].structure.length > 0 )
				{
					roundId = _self.structureCache[ sub.compSeason ].structure[ 0 ].id;
				}
				var model = {
					label : i18n.lookup( 'label.nostandings' ),
					roundId : roundId
				};
				_self.allTablesContainer[ 0 ].innerHTML = Mustache.render( app.templates.nostandings, model );
				addToRound( _self );
		}

	};

	var init = function(){
		// initialise on results lists
		var w = document.querySelectorAll( '[data-widget="table-filtered"]' );
		w = Array.prototype.map.call( w, function( widget ){

			return new app.tabAwareWidget( {
				widgetElement: widget,
				widgetConfig: {},
				widgetConstructor: app.filteredTable
			} );
		} );
	};

	app.filterGroups.setData( init );

} )( PULSE.app, PULSE.core, PULSE.app.common, PULSE.I18N, PULSE.ui );
