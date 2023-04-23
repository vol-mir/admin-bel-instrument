import routes from '../json/routes.json'

export default function (routeName, replacements = {}) {
    let uri = routes[routeName];

    if (uri === undefined)
        console.error('Cannot find route:', routeName)

    Object.keys(replacements)
        .forEach(key => uri = uri.replace(new RegExp('{' + key + '\\??}'), replacements[key]))

    // finally, remove any leftover optional parameters (inc leading slash)
    return uri.replace(/\/{[a-zA-Z]+\?}/, '')
}
