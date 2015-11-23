(function(){var e=window.AmCharts;e.AmSerialChart=e.Class({inherits:e.AmRectangularChart,construct:function(a){this.type="serial";e.AmSerialChart.base.construct.call(this,a);this.cname="AmSerialChart";this.theme=a;this.createEvents("changed");this.columnSpacing=5;this.columnSpacing3D=0;this.columnWidth=.8;this.updateScrollbar=!0;var b=new e.CategoryAxis(a);b.chart=this;this.categoryAxis=b;this.zoomOutOnDataUpdate=!0;this.mouseWheelZoomEnabled=this.mouseWheelScrollEnabled=this.rotate=this.skipZoom=!1;this.minSelectedTime=0;e.applyTheme(this,a,this.cname)},initChart:function(){e.AmSerialChart.base.initChart.call(this);this.updateCategoryAxis(this.categoryAxis,this.rotate,"categoryAxis");this.dataChanged&&(this.updateData(),this.dataChanged=!1,this.dispatchDataUpdated=!0);var a=this.chartCursor;a&&a.updateData&&(a.updateData(),a.fullWidth&&(a.fullRectSet=this.cursorLineSet));var a=this.countColumns(),b=this.graphs,c;for(c=0;c<b.length;c++)b[c].columnCount=a;this.updateScrollbar=!0;this.drawChart();this.autoMargins&&!this.marginsUpdated&&(this.marginsUpdated=!0,this.measureMargins())},handleWheelReal:function(a,b){if(!this.wheelBusy){var c=this.categoryAxis,d=c.parseDates,f=c.minDuration(),e=c=1;this.mouseWheelZoomEnabled?b||(c=-1):b&&(c=-1);var h=this.chartData.length,l=this.lastTime,g=this.firstTime;0>a?d?(h=this.endTime-this.startTime,d=this.startTime+c*f,f=this.endTime+e*f,0<e&&0<c&&f>=l&&(f=l,d=l-h),this.zoomToDates(new Date(d),new Date(f))):(0<e&&0<c&&this.end>=h-1&&(c=e=0),d=this.start+
c,f=this.end+e,this.zoomToIndexes(d,f)):d?(h=this.endTime-this.startTime,d=this.startTime-c*f,f=this.endTime-e*f,0<e&&0<c&&d<=g&&(d=g,f=g+h),this.zoomToDates(new Date(d),new Date(f))):(0<e&&0<c&&1>this.start&&(c=e=0),d=this.start-c,f=this.end-e,this.zoomToIndexes(d,f))}},validateData:function(a){this.marginsUpdated=!1;this.zoomOutOnDataUpdate&&!a&&(this.endTime=this.end=this.startTime=this.start=NaN);e.AmSerialChart.base.validateData.call(this)},drawChart:function(){if(0<this.realWidth&&0<this.realHeight){e.AmSerialChart.base.drawChart.call(this);var a=this.chartData;if(e.ifArray(a)){var b=this.chartScrollbar;b&&b.draw();var a=a.length-1,c,b=this.categoryAxis;if(b.parseDates&&!b.equalSpacing){if(b=this.startTime,c=this.endTime,isNaN(b)||isNaN(c))b=this.firstTime,c=this.lastTime}else if(b=this.start,c=this.end,isNaN(b)||isNaN(c))b=0,c=a;this.endTime=this.startTime=this.end=this.start=void 0;this.zoom(b,c)}}else this.cleanChart();this.dispDUpd()},cleanChart:function(){e.callMethod("destroy",[this.valueAxes,this.graphs,this.categoryAxis,this.chartScrollbar,this.chartCursor])},updateCategoryAxis:function(a,b,c){a.chart=this;a.id=c;a.rotate=b;a.axisRenderer=e.RecAxis;a.guideFillRenderer=e.RecFill;a.axisItemRenderer=e.RecItem;a.setOrientation(!this.rotate);a.x=this.marginLeftReal;a.y=this.marginTopReal;a.dx=this.dx;a.dy=this.dy;a.width=this.plotAreaWidth-1;a.height=this.plotAreaHeight-1;a.viW=this.plotAreaWidth-1;a.viH=this.plotAreaHeight-1;a.viX=this.marginLeftReal;a.viY=this.marginTopReal;a.marginsChanged=!0},updateValueAxes:function(){e.AmSerialChart.base.updateValueAxes.call(this);var a=this.valueAxes,b;for(b=0;b<a.length;b++){var c=a[b],d=this.rotate;c.rotate=d;c.setOrientation(d);d=this.categoryAxis;if(!d.startOnAxis||d.parseDates)c.expandMinMax=!0}},updateData:function(){this.parseData();var a=this.graphs,b,c=this.chartData;for(b=0;b<a.length;b++)a[b].data=c;0<c.length&&(this.firstTime=this.getStartTime(c[0].time),this.lastTime=this.getEndTime(c[c.length-1].time))},getStartTime:function(a){var b=this.categoryAxis;return e.resetDateToMin(new Date(a),b.minPeriod,1,b.firstDayOfWeek).getTime()},getEndTime:function(a){var b=e.extractPeriod(this.categoryAxis.minPeriod);return e.changeDate(new Date(a),b.period,b.count,!0).getTime()-1},updateMargins:function(){e.AmSerialChart.base.updateMargins.call(this);var a=this.chartScrollbar;a&&(this.getScrollbarPosition(a,this.rotate,this.categoryAxis.position),this.adjustMargins(a,this.rotate))},updateScrollbars:function(){e.AmSerialChart.base.updateScrollbars.call(this);this.updateChartScrollbar(this.chartScrollbar,this.rotate)},zoom:function(a,b){var c=this.categoryAxis;c.parseDates&&!c.equalSpacing?this.timeZoom(a,b):this.indexZoom(a,b);this.updateLegendValues()},timeZoom:function(a,b){var c=this.maxSelectedTime;isNaN(c)||(b!=this.endTime&&b-a>c&&(a=b-c,this.updateScrollbar=!0),a!=this.startTime&&b-a>c&&(b=a+c,this.updateScrollbar=!0));var d=this.minSelectedTime;if(0<d&&b-a<d){var f=Math.round(a+(b-a)/2),d=Math.round(d/2);a=f-d;b=f+d}var k=this.chartData,f=this.categoryAxis;if(e.ifArray(k)&&(a!=this.startTime||b!=this.endTime)){var h=f.minDuration(),d=this.firstTime,l=this.lastTime;a||(a=d,isNaN(c)||(a=l-c));b||(b=l);a>l&&(a=l);b<d&&(b=d);a<d&&(a=d);b>l&&(b=l);b<a&&(b=a+h);b-a<h/5&&(b<l?b=a+h/5:a=b-h/5);this.startTime=a;this.endTime=b;c=k.length-1;h=this.getClosestIndex(k,"time",a,!0,0,c);k=this.getClosestIndex(k,"time",b,!1,h,c);f.timeZoom(a,b);f.zoom(h,k);this.start=e.fitToBounds(h,0,c);this.end=e.fitToBounds(k,0,c);this.zoomAxesAndGraphs();this.zoomScrollbar();a!=d||b!=l?this.showZB(!0):this.showZB(!1);this.updateColumnsDepth();this.dispatchTimeZoomEvent()}},updateAfterValueZoom:function(){this.zoomAxesAndGraphs();this.zoomScrollbar();this.updateColumnsDepth()},indexZoom:function(a,b){var c=this.maxSelectedSeries;isNaN(c)||(b!=this.end&&b-a>c&&(a=b-c,this.updateScrollbar=!0),a!=this.start&&b-a>c&&(b=a+c,this.updateScrollbar=!0));if(a!=this.start||b!=this.end){var d=this.chartData.length-1;isNaN(a)&&(a=0,isNaN(c)||(a=d-c));isNaN(b)&&(b=d);b<a&&(b=a);b>d&&(b=d);a>d&&(a=d-1);0>a&&(a=0);this.start=a;this.end=b;this.categoryAxis.zoom(a,b);this.zoomAxesAndGraphs();this.zoomScrollbar();0!==a||b!=this.chartData.length-1?this.showZB(!0):this.showZB(!1);this.updateColumnsDepth();this.dispatchIndexZoomEvent()}},updateGraphs:function(){e.AmSerialChart.base.updateGraphs.call(this);var a=this.graphs,b;for(b=0;b<a.length;b++){var c=a[b];c.columnWidthReal=this.columnWidth;c.categoryAxis=this.categoryAxis;e.isString(c.fillToGraph)&&(c.fillToGraph=this.getGraphById(c.fillToGraph))}},updateColumnsDepth:function(){var a,b=this.graphs,c;e.remove(this.columnsSet);this.columnsArray=[];for(a=0;a<b.length;a++){c=b[a];var d=c.columnsArray;if(d){var f;for(f=0;f<d.length;f++)this.columnsArray.push(d[f])}}this.columnsArray.sort(this.compareDepth);if(0<this.columnsArray.length){b=this.container.set();this.columnSet.push(b);for(a=0;a<this.columnsArray.length;a++)b.push(this.columnsArray[a].column.set);c&&b.translate(c.x,c.y);this.columnsSet=b}},compareDepth:function(a,b){return a.depth>b.depth?1:-1},zoomScrollbar:function(){var a=this.chartScrollbar,b=this.categoryAxis;a&&this.updateScrollbar&&a.enabled&&a.dragger&&(a.dragger.stop(),b.parseDates&&!b.equalSpacing?a.timeZoom(this.startTime,this.endTime):a.zoom(this.start,this.end),this.updateScrollbar=!0)},updateTrendLines:function(){var a=this.trendLines,b;for(b=0;b<a.length;b++){var c=a[b],c=e.processObject(c,e.TrendLine,this.theme);a[b]=c;c.chart=this;c.id||(c.id="trendLineAuto"+b+"_"+(new Date).getTime());e.isString(c.valueAxis)&&(c.valueAxis=this.getValueAxisById(c.valueAxis));c.valueAxis||(c.valueAxis=this.valueAxes[0]);c.categoryAxis=this.categoryAxis}},zoomAxesAndGraphs:function(){if(!this.scrollbarOnly){var a=this.valueAxes,b;for(b=0;b<a.length;b++)a[b].zoom(this.start,this.end);a=this.graphs;for(b=0;b<a.length;b++)a[b].zoom(this.start,this.end);this.zoomTrendLines();(b=this.chartCursor)&&b.zoom&&b.zoom(this.start,this.end,this.startTime,this.endTime)}},countColumns:function(){var a=0,b=this.valueAxes.length,c=this.graphs.length,d,e,k=!1,h,l;for(l=0;l<b;l++){e=this.valueAxes[l];var g=e.stackType;if("100%"==g||"regular"==g)for(k=!1,h=0;h<c;h++)d=this.graphs[h],d.tcc=1,d.valueAxis==e&&"column"==d.type&&(!k&&d.stackable&&(a++,k=!0),(!d.stackable&&d.clustered||d.newStack)&&a++,d.columnIndex=a-1,d.clustered||(d.columnIndex=0));if("none"==g||"3d"==g){k=!1;for(h=0;h<c;h++)d=this.graphs[h],d.valueAxis==e&&"column"==d.type&&(d.clustered?(d.tcc=1,d.newStack&&(a=0),d.hidden||(d.columnIndex=a,a++)):d.hidden||(k=!0,d.tcc=1,d.columnIndex=0));k&&0===a&&(a=1)}if("3d"==g){e=1;for(l=0;l<c;l++)d=this.graphs[l],d.newStack&&e++,d.depthCount=e,d.tcc=a;a=e}}return a},parseData:function(){e.AmSerialChart.base.parseData.call(this);this.parseSerialData(this.dataProvider)},getCategoryIndexByValue:function(a){var b=this.chartData,c,d;for(d=0;d<b.length;d++)b[d].category==a&&(c=d);return c},handleCursorChange:function(a){this.updateLegendValues(a.index)},handleCursorZoom:function(a){this.updateScrollbar=!0;this.zoom(a.start,a.end)},handleScrollbarZoom:function(a){this.updateScrollbar=!1;this.zoom(a.start,a.end)},dispatchTimeZoomEvent:function(){if(this.prevStartTime!=this.startTime||this.prevEndTime!=this.endTime){var a={type:"zoomed"};a.startDate=new Date(this.startTime);a.endDate=new Date(this.endTime);a.startIndex=this.start;a.endIndex=this.end;this.startIndex=this.start;this.endIndex=this.end;this.startDate=a.startDate;this.endDate=a.endDate;this.prevStartTime=this.startTime;this.prevEndTime=this.endTime;var b=this.categoryAxis,c=e.extractPeriod(b.minPeriod).period,b=b.dateFormatsObject[c];a.startValue=e.formatDate(a.startDate,b,this);a.endValue=e.formatDate(a.endDate,b,this);a.chart=this;a.target=this;this.fire(a.type,a)}},dispatchIndexZoomEvent:function(){if(this.prevStartIndex!=this.start||this.prevEndIndex!=this.end){this.startIndex=this.start;this.endIndex=this.end;var a=this.chartData;if(e.ifArray(a)&&!isNaN(this.start)&&!isNaN(this.end)){var b={chart:this,target:this,type:"zoomed"};b.startIndex=this.start;b.endIndex=this.end;b.startValue=a[this.start].category;b.endValue=a[this.end].category;this.categoryAxis.parseDates&&(this.startTime=a[this.start].time,this.endTime=a[this.end].time,b.startDate=new Date(this.startTime),b.endDate=new Date(this.endTime));this.prevStartIndex=this.start;this.prevEndIndex=this.end;this.fire(b.type,b)}}},updateLegendValues:function(a){var b=this.graphs,c;for(c=0;c<b.length;c++){var d=b[c];isNaN(a)?d.currentDataItem=void 0:d.currentDataItem=this.chartData[a].axes[d.valueAxis.id].graphs[d.id]}this.legend&&this.legend.updateValues()},getClosestIndex:function(a,b,c,d,e,k){0>e&&(e=0);k>a.length-1&&(k=a.length-1);var h=e+Math.round((k-
e)/2),l=a[h][b];return c==l?h:1>=k-e?d?e:Math.abs(a[e][b]-c)<Math.abs(a[k][b]-c)?e:k:c==l?h:c<l?this.getClosestIndex(a,b,c,d,e,h):this.getClosestIndex(a,b,c,d,h,k)},zoomToIndexes:function(a,b){this.updateScrollbar=!0;var c=this.chartData;if(c){var d=c.length;0<d&&(0>a&&(a=0),b>d-1&&(b=d-1),d=this.categoryAxis,d.parseDates&&!d.equalSpacing?this.zoom(c[a].time,this.getEndTime(c[b].time)):this.zoom(a,b))}},zoomToDates:function(a,b){this.updateScrollbar=!0;var c=this.chartData;if(this.categoryAxis.equalSpacing){var d=this.getClosestIndex(c,"time",a.getTime(),!0,0,c.length);b=e.resetDateToMin(b,this.categoryAxis.minPeriod,1);c=this.getClosestIndex(c,"time",b.getTime(),!1,0,c.length);this.zoom(d,c)}else this.zoom(a.getTime(),b.getTime())},zoomToCategoryValues:function(a,b){this.updateScrollbar=!0;this.zoom(this.getCategoryIndexByValue(a),this.getCategoryIndexByValue(b))},formatPeriodString:function(a,b){if(b){var c=["value","open","low","high","close"],d="value open low high close average sum count".split(" "),f=b.valueAxis,k=this.chartData,h=b.numberFormatter;h||(h=this.nf);for(var l=0;l<c.length;l++){for(var g=c[l],n=0,p=0,q,m,w,y,v,r=0,t=0,A,u,x,B,C,I=this.start;I<=this.end;I++){var z=k[I];if(z&&(z=z.axes[f.id].graphs[b.id])){if(z.values){var D=z.values[g];if(this.rotate){if(0>z.x||z.x>z.graph.height)D=NaN}else if(0>z.x||z.x>z.graph.width)D=NaN;if(!isNaN(D)){isNaN(q)&&(q=D);m=D;if(isNaN(w)||w>D)w=D;if(isNaN(y)||y<D)y=D;v=e.getDecimals(n);var F=e.getDecimals(D),n=n+D,n=e.roundTo(n,Math.max(v,F));p++;v=n/p}}if(z.percents&&(z=z.percents[g],!isNaN(z))){isNaN(A)&&(A=z);u=z;if(isNaN(x)||x>z)x=z;if(isNaN(B)||B<z)B=z;C=e.getDecimals(r);D=e.getDecimals(z);r+=z;r=e.roundTo(r,Math.max(C,D));t++;C=r/t}}}r={open:A,close:u,high:B,low:x,average:C,sum:r,count:t};a=e.formatValue(a,{open:q,close:m,high:y,low:w,average:v,sum:n,count:p},d,h,g+"\\.",this.usePrefixes,this.prefixesOfSmallNumbers,this.prefixesOfBigNumbers);a=e.formatValue(a,r,d,this.pf,"percents\\."+g+"\\.")}}return a=e.cleanFromEmpty(a)},formatString:function(a,b,c){var d=b.graph;if(-1!=a.indexOf("[[category]]")){var f=b.serialDataItem.category;if(this.categoryAxis.parseDates){var k=this.balloonDateFormat,h=this.chartCursor;h&&(k=h.categoryBalloonDateFormat);-1!=a.indexOf("[[category]]")&&(k=e.formatDate(f,k,this),-1!=k.indexOf("fff")&&(k=e.formatMilliseconds(k,f)),f=k)}a=a.replace(/\[\[category\]\]/g,String(f))}f=d.numberFormatter;f||(f=this.nf);k=b.graph.valueAxis;(h=k.duration)&&!isNaN(b.values.value)&&(h=e.formatDuration(b.values.value,h,"",k.durationUnits,k.maxInterval,f),a=a.replace(RegExp("\\[\\[value\\]\\]","g"),h));"date"==k.type&&(k=e.formatDate(new Date(b.values.value),d.dateFormat,this),h=RegExp("\\[\\[value\\]\\]","g"),a=a.replace(h,k),k=e.formatDate(new Date(b.values.open),d.dateFormat,this),h=RegExp("\\[\\[open\\]\\]","g"),a=a.replace(h,k));d="value open low high close total".split(" ");k=this.pf;a=e.formatValue(a,b.percents,d,k,"percents\\.");a=e.formatValue(a,b.values,d,f,"",this.usePrefixes,this.prefixesOfSmallNumbers,this.prefixesOfBigNumbers);a=e.formatValue(a,b.values,["percents"],k);-1!=a.indexOf("[[")&&(a=e.formatDataContextValue(a,b.dataContext));-1!=a.indexOf("[[")&&b.graph.customData&&(a=e.formatDataContextValue(a,b.graph.customData));return a=e.AmSerialChart.base.formatString.call(this,a,b,c)},addChartScrollbar:function(a){e.callMethod("destroy",[this.chartScrollbar]);a&&(a.chart=this,this.listenTo(a,"zoomed",this.handleScrollbarZoom));this.rotate?void 0===a.width&&(a.width=a.scrollbarHeight):void 0===a.height&&(a.height=a.scrollbarHeight);this.chartScrollbar=a},removeChartScrollbar:function(){e.callMethod("destroy",[this.chartScrollbar]);this.chartScrollbar=null},handleReleaseOutside:function(a){e.AmSerialChart.base.handleReleaseOutside.call(this,a);e.callMethod("handleReleaseOutside",[this.chartScrollbar])},update:function(){e.AmSerialChart.base.update.call(this);this.chartScrollbar&&this.chartScrollbar.update&&this.chartScrollbar.update()}})})();(function(){var e=window.AmCharts;e.Cuboid=e.Class({construct:function(a,b,c,d,e,k,h,l,g,n,p,q,m,w,y,v,r){this.set=a.set();this.container=a;this.h=Math.round(c);this.w=Math.round(b);this.dx=d;this.dy=e;this.colors=k;this.alpha=h;this.bwidth=l;this.bcolor=g;this.balpha=n;this.dashLength=w;this.topRadius=v;this.pattern=y;this.rotate=m;this.bcn=r;m?0>b&&0===p&&(p=180):0>c&&270==p&&(p=90);this.gradientRotation=p;0===d&&0===e&&(this.cornerRadius=q);this.draw()},draw:function(){var a=this.set;a.clear();var b=this.container,c=b.chart,d=this.w,f=this.h,k=this.dx,h=this.dy,l=this.colors,g=this.alpha,n=this.bwidth,p=this.bcolor,q=this.balpha,m=this.gradientRotation,w=this.cornerRadius,y=this.dashLength,v=this.pattern,r=this.topRadius,t=this.bcn,A=l,u=l;"object"==typeof l&&(A=l[0],u=l[l.length-1]);var x,B,C,I,z,D,F,L,M,Q=g;v&&(g=0);var E,G,H,J,K=this.rotate;if(0<Math.abs(k)||0<Math.abs(h))if(isNaN(r))F=u,u=e.adjustLuminosity(A,-.2),u=e.adjustLuminosity(A,-.2),x=e.polygon(b,[0,k,d+k,d,0],[0,h,h,0,0],u,g,1,p,0,m),0<q&&(M=e.line(b,[0,k,d+k],[0,h,h],p,q,n,y)),B=e.polygon(b,[0,0,d,d,0],[0,f,f,0,0],u,g,1,p,0,m),B.translate(k,h),0<q&&(C=e.line(b,[k,k],[h,h+f],p,q,n,y)),I=e.polygon(b,[0,0,k,k,0],[0,f,f+h,h,0],u,g,1,p,0,m),z=e.polygon(b,[d,d,d+k,d+k,d],[0,f,f+h,h,0],u,g,1,p,0,m),0<q&&(D=e.line(b,[d,d+k,d+k,d],[0,h,f+h,f],p,q,n,y)),u=e.adjustLuminosity(F,.2),F=e.polygon(b,[0,k,d+k,d,0],[f,f+h,f+h,f,f],u,g,1,p,0,m),0<q&&(L=e.line(b,[0,k,d+k],[f,f+h,f+h],p,q,n,y));else{var N,O,P;K?(N=f/2,u=k/2,P=f/2,O=d+k/2,G=Math.abs(f/2),E=Math.abs(k/2)):(u=d/2,N=h/2,O=d/2,P=f+h/2+1,E=Math.abs(d/2),G=Math.abs(h/2));H=E*r;J=G*r;.1<E&&.1<E&&(x=e.circle(b,E,A,g,n,p,q,!1,G),x.translate(u,N));.1<H&&.1<H&&(F=e.circle(b,H,e.adjustLuminosity(A,.5),g,n,p,q,!1,J),F.translate(O,P))}g=Q;1>Math.abs(f)&&(f=0);1>Math.abs(d)&&(d=0);!isNaN(r)&&(0<Math.abs(k)||0<Math.abs(h))?(l=[A],l={fill:l,stroke:p,"stroke-width":n,"stroke-opacity":q,"fill-opacity":g},K?(g="M0,0 L"+d+","+(f/2-f/2*r),n=" B",0<d&&(n=" A"),e.VML?(g+=n+Math.round(d-
H)+","+Math.round(f/2-J)+","+Math.round(d+H)+","+Math.round(f/2+J)+","+d+",0,"+d+","+f,g=g+(" L0,"+f)+(n+Math.round(-E)+","+Math.round(f/2-G)+","+Math.round(E)+","+Math.round(f/2+G)+",0,"+f+",0,0")):(g+="A"+H+","+J+",0,0,0,"+d+","+(f-f/2*(1-r))+"L0,"+f,g+="A"+E+","+G+",0,0,1,0,0"),E=90):(n=d/2-d/2*r,g="M0,0 L"+n+","+f,e.VML?(g="M0,0 L"+n+","+f,n=" B",0>f&&(n=" A"),g+=n+Math.round(d/2-H)+","+Math.round(f-J)+","+Math.round(d/2+H)+","+Math.round(f+J)+",0,"+f+","+d+","+f,g+=" L"+d+",0",g+=n+Math.round(d/
2+E)+","+Math.round(G)+","+Math.round(d/2-E)+","+Math.round(-G)+","+d+",0,0,0"):(g+="A"+H+","+J+",0,0,0,"+(d-d/2*(1-r))+","+f+"L"+d+",0",g+="A"+E+","+G+",0,0,1,0,0"),E=180),b=b.path(g).attr(l),b.gradient("linearGradient",[A,e.adjustLuminosity(A,-.3),e.adjustLuminosity(A,-.3),A],E),K?b.translate(k/2,0):b.translate(0,h/2)):b=0===f?e.line(b,[0,d],[0,0],p,q,n,y):0===d?e.line(b,[0,0],[0,f],p,q,n,y):0<w?e.rect(b,d,f,l,g,n,p,q,w,m,y):e.polygon(b,[0,0,d,d,0],[0,f,f,0,0],l,g,n,p,q,m,!1,y);d=isNaN(r)?0>f?[x,M,B,C,I,z,D,F,L,b]:[F,L,B,C,I,z,x,M,D,b]:K?0<d?[x,b,F]:[F,b,x]:0>f?[x,b,F]:[F,b,x];e.setCN(c,b,t+"front");e.setCN(c,B,t+"back");e.setCN(c,F,t+"top");e.setCN(c,x,t+"bottom");e.setCN(c,I,t+"left");e.setCN(c,z,t+"right");for(x=0;x<d.length;x++)if(B=d[x])a.push(B),e.setCN(c,B,t+"element");v&&b.pattern(v,NaN,c.path)},width:function(a){isNaN(a)&&(a=0);this.w=Math.round(a);this.draw()},height:function(a){isNaN(a)&&(a=0);this.h=Math.round(a);this.draw()},animateHeight:function(a,b){var c=this;c.easing=b;c.totalFrames=Math.round(1E3*a/e.updateRate);c.rh=c.h;c.frame=0;c.height(1);setTimeout(function(){c.updateHeight.call(c)},e.updateRate)},updateHeight:function(){var a=this;a.frame++;var b=a.totalFrames;a.frame<=b&&(b=a.easing(0,a.frame,1,a.rh-1,b),a.height(b),setTimeout(function(){a.updateHeight.call(a)},e.updateRate))},animateWidth:function(a,b){var c=this;c.easing=b;c.totalFrames=Math.round(1E3*a/e.updateRate);c.rw=c.w;c.frame=0;c.width(1);setTimeout(function(){c.updateWidth.call(c)},e.updateRate)},updateWidth:function(){var a=this;a.frame++;var b=a.totalFrames;a.frame<=b&&(b=a.easing(0,a.frame,1,a.rw-1,b),a.width(b),setTimeout(function(){a.updateWidth.call(a)},e.updateRate))}})})();(function(){var e=window.AmCharts;e.CategoryAxis=e.Class({inherits:e.AxisBase,construct:function(a){this.cname="CategoryAxis";e.CategoryAxis.base.construct.call(this,a);this.minPeriod="DD";this.equalSpacing=this.parseDates=!1;this.position="bottom";this.startOnAxis=!1;this.firstDayOfWeek=1;this.gridPosition="middle";this.markPeriodChange=this.boldPeriodBeginning=!0;this.safeDistance=30;this.centerLabelOnFullPeriod=!0;e.applyTheme(this,a,this.cname)},draw:function(){e.CategoryAxis.base.draw.call(this);this.generateDFObject();var a=this.chart.chartData;this.data=a;this.labelRotationR=this.labelRotation;if(e.ifArray(a)){var b,c=this.chart;"scrollbar"!=this.id?(e.setCN(c,this.set,"category-axis"),e.setCN(c,this.labelsSet,"category-axis"),e.setCN(c,this.axisLine.axisSet,"category-axis")):this.bcn=this.id+"-";var d=this.start,f=this.labelFrequency,k=0,h=this.end-d+1,l=this.gridCountR,g=this.showFirstLabel,n=this.showLastLabel,p,q,m="",m=e.extractPeriod(this.minPeriod),w=e.getPeriodDuration(m.period,m.count),y,v,r,t;y=this.rotate;p=this.firstDayOfWeek;q=this.boldPeriodBeginning;b=e.resetDateToMin(new Date(a[a.length-1].time+1.05*w),this.minPeriod,1,p).getTime();this.firstTime=c.firstTime;this.endTime>b&&(this.endTime=b);t=this.minorGridEnabled;var A=this.gridAlpha,u,x=0,B=0;if(this.widthField)for(b=0;b<this.data.length;b++)if(u=this.data[b]){var C=Number(this.data[b].dataContext[this.widthField]);isNaN(C)||(x+=C,u.widthValue=C)}if(this.parseDates&&!this.equalSpacing)this.lastTime=a[a.length-
1].time,this.maxTime=e.resetDateToMin(new Date(this.lastTime+1.05*w),this.minPeriod,1,p).getTime(),this.timeDifference=this.endTime-this.startTime,this.parseDatesDraw();else if(!this.parseDates){if(this.cellWidth=this.getStepWidth(h),h<l&&(l=h),k+=this.start,this.stepWidth=this.getStepWidth(h),0<l)for(l=Math.floor(h/l),h=this.chooseMinorFrequency(l),m=k,m/2==Math.round(m/2)&&m--,0>m&&(m=0),u=0,this.end-m+1>=this.autoRotateCount&&(this.labelRotationR=this.autoRotateAngle),b=m;b<=this.end+2;b++){q=!1;0<=b&&b<this.data.length?(v=this.data[b],m=v.category,q=v.forceShow):m="";if(t&&!isNaN(h))if(b/h==Math.round(b/h)||q)b/l==Math.round(b/l)||q||(this.gridAlpha=this.minorGridAlpha,m=void 0);else continue;else if(b/l!=Math.round(b/l)&&!q)continue;p=this.getCoordinate(b-k);r=0;"start"==this.gridPosition&&(p-=this.cellWidth/2,r=this.cellWidth/2);q=!0;a=r;"start"==this.tickPosition&&(a=0,q=!1,r=0);if(b==d&&!g||b==this.end&&!n)m=void 0;Math.round(u/f)!=u/f&&(m=void 0);u++;C=this.cellWidth;y&&(C=NaN,this.ignoreAxisWidth||!c.autoMargins)&&(C="right"==this.position?c.marginRight:c.marginLeft,C-=this.tickLength+10);this.labelFunction&&v&&(m=this.labelFunction(m,v,this));m=e.fixBrakes(m);w=!1;this.boldLabels&&(w=!0);b>this.end&&"start"==this.tickPosition&&(m=" ");this.rotate&&this.inside&&(r=-2);isNaN(v.widthValue)||(v.percentWidthValue=v.widthValue/x*100,C=this.rotate?this.height*v.widthValue/x:this.width*v.widthValue/x,p=B,B+=C,r=C/2);r=new this.axisItemRenderer(this,p,m,q,C,r,void 0,w,a,!1,v.labelColor,v.className);r.serialDataItem=v;this.pushAxisItem(r);this.gridAlpha=A}}else if(this.parseDates&&this.equalSpacing){k=this.start;this.startTime=this.data[this.start].time;this.endTime=this.data[this.end].time;this.timeDifference=this.endTime-this.startTime;b=this.choosePeriod(0);f=b.period;y=b.count;b=e.getPeriodDuration(f,y);b<w&&(f=m.period,y=m.count,b=w);v=f;"WW"==v&&(v="DD");this.stepWidth=this.getStepWidth(h);l=Math.ceil(this.timeDifference/b)+1;w=e.resetDateToMin(new Date(this.startTime-b),f,y,p).getTime();this.cellWidth=this.getStepWidth(h);m=Math.round(w/b);d=-1;m/2==Math.round(m/2)&&(d=-2,w-=b);m=this.start;m/2==Math.round(m/2)&&m--;0>m&&(m=0);A=this.end+2;A>=this.data.length&&(A=this.data.length);B=!1;B=!g;this.previousPos=-1E3;20<this.labelRotationR&&(this.safeDistance=5);u=m;if(this.data[m].time!=e.resetDateToMin(new Date(this.data[m].time),f,y,p).getTime())for(p=0,a=w,b=m;b<A;b++)h=this.data[b].time,this.checkPeriodChange(f,y,h,a)&&(p++,2<=p&&(u=b,b=A),a=h);t&&1<y&&(h=this.chooseMinorFrequency(y),e.getPeriodDuration(f,h));if(0<this.gridCountR)for(b=m;b<A;b++)if(h=this.data[b].time,this.checkPeriodChange(f,y,h,w)&&b>=u){p=this.getCoordinate(b-this.start);t=!1;this.nextPeriod[v]&&(t=this.checkPeriodChange(this.nextPeriod[v],1,h,w,v));w=!1;t&&this.markPeriodChange?(t=this.dateFormatsObject[this.nextPeriod[v]],w=!0):t=this.dateFormatsObject[v];m=e.formatDate(new Date(h),t,c);if(b==d&&!g||b==l&&!n)m=" ";B?B=!1:(q||(w=!1),p-this.previousPos>this.safeDistance*Math.cos(this.labelRotationR*Math.PI/
180)&&(this.labelFunction&&(m=this.labelFunction(m,new Date(h),this,f,y,r)),this.boldLabels&&(w=!0),r=new this.axisItemRenderer(this,p,m,void 0,void 0,void 0,void 0,w),t=r.graphics(),this.pushAxisItem(r),t=t.getBBox().width,e.isModern||(t-=p),this.previousPos=p+t));r=w=h}}for(b=0;b<this.data.length;b++)if(u=this.data[b])this.parseDates&&!this.equalSpacing?(g=u.time,n=this.cellWidth,"MM"==this.minPeriod&&(n=864E5*e.daysInMonth(new Date(g))*this.stepWidth,u.cellWidth=n),g=Math.round((g-this.startTime)*this.stepWidth+n/2)):g=this.getCoordinate(b-k),isNaN(u.widthValue)||(u.percentWidthValue=u.widthValue/x*100,g=this.rotate?this.height*u.widthValue/x:this.width*u.widthValue/x),u.x[this.id]=g;x=this.guides.length;for(b=0;b<x;b++)g=this.guides[b],q=l=l=t=d=NaN,n=g.above,g.toCategory&&(l=c.getCategoryIndexByValue(g.toCategory),isNaN(l)||(d=this.getCoordinate(l-k),g.expand&&(d+=this.cellWidth/2),r=new this.axisItemRenderer(this,d,"",!0,NaN,NaN,g),this.pushAxisItem(r,n))),g.category&&(q=c.getCategoryIndexByValue(g.category),isNaN(q)||(t=this.getCoordinate(q-k),g.expand&&(t-=this.cellWidth/2),l=(d-t)/2,r=new this.axisItemRenderer(this,t,g.label,!0,NaN,l,g),this.pushAxisItem(r,n))),q=c.dataDateFormat,g.toDate&&(g.toDate=e.getDate(g.toDate,q),this.equalSpacing?(l=c.getClosestIndex(this.data,"time",g.toDate.getTime(),!1,0,this.data.length-1),isNaN(l)||(d=this.getCoordinate(l-k))):d=(g.toDate.getTime()-this.startTime)*this.stepWidth,r=new this.axisItemRenderer(this,d,"",!0,NaN,NaN,g),this.pushAxisItem(r,n)),g.date&&(g.date=e.getDate(g.date,q),this.equalSpacing?(q=c.getClosestIndex(this.data,"time",g.date.getTime(),!1,0,this.data.length-1),isNaN(q)||(t=this.getCoordinate(q-k))):t=(g.date.getTime()-this.startTime)*this.stepWidth,l=(d-t)/2,q=!0,g.toDate&&(q=!1),r="H"==this.orientation?new this.axisItemRenderer(this,t,g.label,q,2*l,NaN,g):new this.axisItemRenderer(this,t,g.label,!1,NaN,l,g),this.pushAxisItem(r,n)),(0<d||0<t)&&(d<this.width||t<this.width)&&(d=new this.guideFillRenderer(this,t,d,g),t=d.graphics(),this.pushAxisItem(d,n),g.graphics=t,t.index=b,g.balloonText&&this.addEventListeners(t,g))}this.axisCreated=!0;c=this.x;k=this.y;this.set.translate(c,k);this.labelsSet.translate(c,k);this.labelsSet.show();this.positionTitle();(c=this.axisLine.set)&&c.toFront();c=this.getBBox().height;2<c-this.previousHeight&&this.autoWrap&&!this.parseDates&&(this.axisCreated=this.chart.marginsUpdated=!1);this.previousHeight=c},xToIndex:function(a){var b=this.data,c=this.chart,d=c.rotate,f=this.stepWidth;this.parseDates&&!this.equalSpacing?(a=this.startTime+Math.round(a/f)-this.minDuration()/2,c=c.getClosestIndex(b,"time",a,!1,this.start,this.end+1)):(this.startOnAxis||(a-=f/2),c=this.start+Math.round(a/f));var c=e.fitToBounds(c,0,b.length-1),k;b[c]&&(k=b[c].x[this.id]);d?k>this.height+1&&c--:k>this.width+1&&c--;0>k&&c++;return c=e.fitToBounds(c,0,b.length-1)},dateToCoordinate:function(a){return this.parseDates&&!this.equalSpacing?(a.getTime()-this.startTime)*this.stepWidth:this.parseDates&&this.equalSpacing?(a=this.chart.getClosestIndex(this.data,"time",a.getTime(),!1,0,this.data.length-1),this.getCoordinate(a-this.start)):NaN},categoryToCoordinate:function(a){return this.chart?(a=this.chart.getCategoryIndexByValue(a),this.getCoordinate(a-this.start)):NaN},coordinateToDate:function(a){return this.equalSpacing?(a=this.xToIndex(a),new Date(this.data[a].time)):new Date(this.startTime+a/this.stepWidth)},getCoordinate:function(a){a*=this.stepWidth;this.startOnAxis||(a+=this.stepWidth/2);return Math.round(a)}})})();