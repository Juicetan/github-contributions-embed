# github-contributions-embed

Embed your GitHub contributions graph on any page with a simple configurable URL.

[View Demo](https://contributions.okcode.club)

![image](https://github.com/user-attachments/assets/06fa0cd4-deb7-4a7e-a157-06d6cdc71724)

### Embed URL
`https://contributions.okcode.club/embed.html?username={ github username }&axis=false&dark=true`

1. Embed Iframe
```html
<iframe class="github-embed" src="https://contributions.okcode.club/embed.html?username=juicetan&axis=false&dark=true" frameborder="0"></iframe>
```

2. Style accordingly
```css
.github-embed{
  max-width: 1000px;
  height: 109px;
  width: 100%;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
```

### Embed URL Parameters

| Key | Default | Description |
| :-- | :------ | :---------- |
| username | yyx990803 | GitHub username for whom the contribution graph is to be retrieved. |
| axis | true | Indicates whether or not to include graph axis labels.  Note: axis labels will increase height of inner content. |
| dark | false | Enables dark mode styling if set to true and assumes background will be dark coloured. |
